<?php

namespace App\Repositories;

use App\Interfaces\BrandInterface;
use App\Models\Brand;
use Illuminate\Support\Collection;

class BrandRepository implements BrandInterface
{

    public function getAll(): Collection
    {
        return Brand::latest()->get();
    }

    public function store(array $data): void
    {
        Brand::create($data);
    }

    public function update(Brand $model, $data): void
    {
        $model->update($data);
    }

    public function destroy(Brand $model): bool
    {
        return $model->delete();
    }
}
