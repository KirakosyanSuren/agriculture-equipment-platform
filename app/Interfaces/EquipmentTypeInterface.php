<?php

namespace App\Interfaces;

use App\Models\EquipmentType;
use Illuminate\Support\Collection;

interface EquipmentTypeInterface
{
    public function getAll(): Collection;

    public function store(array $data): void;

    public function update(EquipmentType $model, array $data):void;

    public function destroy(EquipmentType $model): bool;
}
