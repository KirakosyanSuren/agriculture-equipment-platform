<?php

namespace App\Services;

use App\Interfaces\ContactInterface;
use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactService
{
    public function __construct(
        private ContactInterface $contact_repository
    ) {}

    public function getAll(): Collection {
        return $this->contact_repository->getAll();
    }

    public function getActive(): Collection {
        return $this->contact_repository->getActive();
    }

    public function store(array $data): void {
        $this->contact_repository->store($data);
    }

    public function update(Contact $model, array $data): void {
        $this->contact_repository->update($model, $data);
    }

    public function destroy(Contact $model): bool {
        return $this->contact_repository->destroy($model);
    }

    public function changeStatus(Contact $model): void {
        $this->contact_repository->changeStatus($model);
    }
}
