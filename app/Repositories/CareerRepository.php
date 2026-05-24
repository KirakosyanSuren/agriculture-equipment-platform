<?php

namespace App\Repositories;

use App\Interfaces\CareerInterface;
use App\Models\Career;
use Illuminate\Support\Collection;

class CareerRepository implements CareerInterface
{
    public function getAll(): Collection
    {
        return Career::latest()->get();
    }

    public function getActive(): Collection {
        return Career::where('is_active', 1)->get();
    }

    public function store(array $data): void
    {
        Career::create($data);
    }

    public function update(Career $model, array $data): void
    {
        $model->update($data);
    }

    public function destroy(Career $model): bool
    {
        return $model->delete();
    }

    public function ChangeStatus(Career $model): void
    {
        $model->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
    }
}
