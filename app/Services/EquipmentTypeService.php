<?php

namespace App\Services;

use App\Interfaces\EquipmentTypeInterface;
use App\Models\EquipmentType;
use Illuminate\Support\Collection;

class EquipmentTypeService
{
    public function __construct(
        private EquipmentTypeInterface $equipment_repository
    ){}

    public function getAll(): Collection
    {
        return $this->equipment_repository->getALl();
    }

    public function store(array $data): void
    {
        $this->equipment_repository->store($data);
    }

    public function update(EquipmentType $model, array $data): void
    {
        $this->equipment_repository->update($model, $data);
    }

    public function destroy(EquipmentType $model): bool
    {
        return $this->equipment_repository->destroy($model);
    }
}
