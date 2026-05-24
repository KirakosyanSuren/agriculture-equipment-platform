<?php

namespace App\Services;

use App\Interfaces\InventoryInterface;
use App\Models\File;
use App\Models\Inventory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class InventoryService
{

    public function __construct(
        private InventoryInterface $inventory_repository,
        private FileService $file_service
    ) {}

    public function getAll(array $filters): LengthAwarePaginator
    {
        return $this->inventory_repository->getAll($filters);
    }

    public function findBySlug(string $slug): Inventory
    {
        return $this->inventory_repository->findBySlug($slug);
    }

    public function getFeatured(): Collection
    {
        return $this->inventory_repository->getFeatured();
    }

    public function getRandom(): Inventory
    {
        return $this->inventory_repository->getRandom();
    }

    public function store(array $data): void
    {
        $inventory_data = Arr::except($data, [
            'is_main',
            'images'
        ]);

        $inventory = $this->inventory_repository->store($inventory_data);

        $this->file_service->uploadMany(
            model: $inventory,
            files: $data['images'],
            directory: 'inventories/' . $inventory->id,
            type: 'image',
            mainIndex: (int) $data['is_main'],
        );

    }

    public function update(Inventory $model, array $data): void
    {

        $inventory_data = Arr::except($data, [
            '_token',
            '_method',
            'is_main',
            'images',
            'deleted_images'
        ]);

        $this->inventory_repository->update($model, $inventory_data);

        if (!empty($data['deleted_images'])) {

            $files = File::query()
                ->whereIn('id', $data['deleted_images'])
                ->where( 'fileable_type', Inventory::class)
                ->where('fileable_id', $model->id)
                ->get();

            $this->file_service->deleteMany($files);
        }

        if (!empty($data['images'])) {

            $this->file_service->uploadMany(
                model: $model,
                files: $data['images'],
                directory: "inventories/{$model->id}",
                type: 'image',
                mainIndex: (int) $data['is_main']
            );
        }

        $mainImageExists = $model->images()
            ->where('is_main', true)
            ->exists();


        if (!$mainImageExists) {

            $newMainImage = $model->images()
                ->first();

            if ($newMainImage) {
                $newMainImage->update([
                    'is_main' => true,
                ]);
            }
        }

    }

    public function destroy(Inventory $model): bool
    {
        $this->file_service->deleteMany($model->files);
        return $this->inventory_repository->destroy($model);
    }

    public function changeStatus(Inventory $model): void
    {
        $this->inventory_repository->changeStatus($model);
    }


}
