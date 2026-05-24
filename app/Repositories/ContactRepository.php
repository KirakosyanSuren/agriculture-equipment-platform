<?php

namespace App\Repositories;

use App\Interfaces\ContactInterface;
use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactRepository implements ContactInterface
{
    public function getAll(): Collection {
        return Contact::latest()->get();
    }

    public function getActive(): Collection {
        return Contact::where('is_active', 1)->latest()->get();
    }

    public function store(array $data): void {
        Contact::create($data);
    }

    public function update(Contact $model, array $data): void {
        $model->update($data);
    }

    public function destroy(Contact $model): bool {
        return $model->delete();
    }

    public function changeStatus(Contact $model): void {
        $model->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
    }
}
