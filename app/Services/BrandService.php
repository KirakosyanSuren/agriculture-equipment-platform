<?php

namespace App\Services;

use App\Interfaces\BrandInterface;
use App\Models\Brand;
use Illuminate\Support\Collection;

class BrandService
{
    public function __construct(
        private BrandInterface $brand_repository
    ){}

    public function getAll(): Collection
    {
        return $this->brand_repository->getALl();
    }

    public function store(array $data): void
    {
        $this->brand_repository->store($data);
    }

    public function update(Brand $model, array $data): void
    {
        $this->brand_repository->update($model, $data);
    }

    public function destroy(Brand $model): bool
    {
        return $this->brand_repository->destroy($model);
    }
}
