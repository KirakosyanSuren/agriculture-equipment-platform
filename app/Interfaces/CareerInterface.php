<?php

namespace App\Interfaces;

use App\Models\Career;
use Illuminate\Support\Collection;

interface CareerInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): void;

    public function update(Career $model, array $data): void;

    public function destroy(Career $model): bool;

    public function changeStatus(Career $model): void;
}
