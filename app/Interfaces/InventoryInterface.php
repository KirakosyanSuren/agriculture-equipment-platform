<?php

namespace App\Interfaces;

use App\Models\Inventory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface InventoryInterface
{

    public function getAll(array $filters): LengthAwarePaginator;

    public function findBySlug(string $slug): Inventory;

    public function getFeatured(): Collection;

    public function getRandom(): Inventory;

    public function store(array $data): Inventory;

    public function update(Inventory $model, array $data): void;

    public function destroy(Inventory $model): bool;

    public function changeStatus(Inventory $model): void;

}
