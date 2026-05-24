<?php

namespace App\Repositories;

use App\Interfaces\EquipmentTypeInterface;
use App\Models\EquipmentType;
use Illuminate\Support\Collection;

class EquipmentTypeRepository implements EquipmentTypeInterface
{

    public function getAll(): Collection
    {
        return EquipmentType::latest()->get();
    }

    public function store(array $data): void
    {
        EquipmentType::create($data);
    }

    public function update(EquipmentType $model, $data): void
    {
        $model->update($data);
    }

    public function destroy(EquipmentType $model): bool
    {
        return $model->delete();
    }
}
