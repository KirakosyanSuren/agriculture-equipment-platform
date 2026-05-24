<?php

namespace App\Interfaces;

use App\Models\Brand;
use Illuminate\Support\Collection;

interface BrandInterface
{
    public function getAll(): Collection;

    public function store(array $data): void;

    public function update(Brand $model, array $data):void;

    public function destroy(Brand $model): bool;
}
