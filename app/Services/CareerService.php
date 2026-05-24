<?php

namespace App\Services;

use App\Interfaces\CareerInterface;
use App\Models\Career;
use Illuminate\Support\Collection;

class CareerService
{
    public function __construct(
        private CareerInterface $career_interface
    ) {}

    public function getAll(): Collection
    {
        return $this->career_interface->getAll();
    }

    public function getActive(): Collection
    {
        return $this->career_interface->getActive();
    }

    public function store(array $data): void
    {
        $this->career_interface->store($data);
    }

    public function update(Career $model, array $data): void
    {
        $this->career_interface->update($model, $data);
    }

    public function destroy(Career $model): bool
    {
        return $this->career_interface->destroy($model);
    }

    public function ChangeStatus(Career $model): void
    {
        $this->career_interface->changeStatus($model);
    }
}
