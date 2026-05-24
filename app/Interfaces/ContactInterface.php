<?php

namespace App\Interfaces;

use App\Models\Contact;
use Illuminate\Support\Collection;

interface ContactInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): void;

    public function update(Contact $model, array $data): void;

    public function destroy(Contact $model): bool;

    public function changeStatus(Contact $model): void;
}
