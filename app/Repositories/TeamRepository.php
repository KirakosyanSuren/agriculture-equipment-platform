<?php

namespace App\Repositories;

use App\Interfaces\TeamInterface;
use App\Models\TeamMember;
use Illuminate\Support\Collection;

class TeamRepository implements TeamInterface
{
    public function getAll(): Collection {
        return TeamMember::latest()->get();
    }

    public function getActive(): Collection {
        return TeamMember::where('is_active', 1)->latest()->get();
    }

    public function store(array $data): TeamMember {
        return TeamMember::create($data);
    }

    public function update(TeamMember $model, array $data): void {
        $model->update($data);
    }

    public function destroy(TeamMember $model): bool {
        return $model->delete();
    }

    public function changeStatus(TeamMember $model): void {
        $model->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
    }
}
