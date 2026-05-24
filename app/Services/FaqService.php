<?php

namespace App\Services;

use App\Interfaces\FaqInterface;
use App\Models\Faq;
use Illuminate\Support\Collection;

class FaqService
{

    public function __construct(
        private FaqInterface $faq_repository
    ) {}

    public function getAll(): Collection
    {
        return $this->faq_repository->getAll();
    }

    public function getActive(): Collection
    {
        return $this->faq_repository->getActive();
    }

    public function store(array $data): void
    {
        $this->faq_repository->store($data);
    }

    public function update(Faq $model, array $data): void
    {
        $this->faq_repository->update($model, $data);
    }

    public function destroy(Faq $model): bool
    {
        return $this->faq_repository->destroy($model);
    }

    public function changeStatus(Faq $model): void
    {
        $this->faq_repository->changeStatus($model);
    }

}
