<?php

namespace App\Interfaces;

use App\Models\TeamMember;
use Illuminate\Support\Collection;

interface TeamInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): TeamMember;

    public function update(TeamMember $member, array $data): void;

    public function destroy(TeamMember $member): bool;

    public function changeStatus(TeamMember $member): void;
}
