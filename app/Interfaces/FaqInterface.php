<?php

namespace App\Interfaces;

use App\Models\Faq;
use Illuminate\Support\Collection;

interface FaqInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): void;

    public function update(Faq $model, array $data);

    public function destroy(Faq $model);

    public function changeStatus(Faq $model): void;

}
