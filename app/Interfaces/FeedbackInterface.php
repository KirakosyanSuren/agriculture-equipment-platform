<?php

namespace App\Interfaces;

use App\Models\Feedback;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface FeedbackInterface
{

    public function getAll(array $filters): LengthAwarePaginator;
    public function store(array $data): Feedback;

    public function getPageNames(): Collection;

    public function destroy(Feedback $model): bool;

    public function changeStatus(Feedback $model): void;
}
