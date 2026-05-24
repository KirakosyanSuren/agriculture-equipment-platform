<?php

namespace App\Repositories;

use App\Interfaces\InventoryInterface;
use App\Models\Inventory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class InventoryRepository implements InventoryInterface
{

    public function getAll(array $filters): LengthAwarePaginator
    {

        return Inventory::query($filters)

            ->when(
                !empty($filters['title']),
                fn ($query) => $query->where(
                    'title',
                    'like',
                    '%' . $filters['title'] . '%'
                )
            )

            ->when(
                !empty($filters['brand_id']),
                fn ($query) => $query->whereHas(
                    'brand',
                    fn ($query) => $query->where(
                        'id',
                        $filters['brand_id']
                    )
                )
            )

            ->when(
                !empty($filters['equipment_type_id']),
                fn ($query) => $query->whereHas(
                    'equipment_type',
                    fn ($query) => $query->where(
                        'id',
                        $filters['equipment_type_id']
                    )
                )
            )

            ->when(
                !empty($filters['min_price']),
                fn ($query) => $query->where(
                    'price',
                    '>=',
                    $filters['min_price']
                )
            )

            ->when(
                !empty($filters['max_price']),
                fn ($query) => $query->where(
                    'price',
                    '<=',
                    $filters['max_price']
                )
            )

            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function findBySlug(string $slug): Inventory
    {
        return Inventory::where('slug', $slug)
            ->with('brand', 'equipment_type')
            ->first();
    }

    public function getFeatured(): Collection
    {
        return Inventory::where('is_featured', 1)
            ->with('brand', 'equipment_type')
            ->latest()
            ->get();
    }

    public function getRandom(): Inventory {
        return Inventory::inRandomOrder()->first();
    }


    public function store(array $data): Inventory
    {

       return Inventory::create($data);
    }

    public function update(Inventory $model, array $data): void
    {
        $model->update($data);
    }

    public function destroy(Inventory $model): bool
    {
        return $model->delete();
    }

    public function changeStatus(Inventory $model): void
    {
        $model->update([
            'is_featured' => $model->is_featured == 1 ? 0 : 1
        ]);
    }

}
