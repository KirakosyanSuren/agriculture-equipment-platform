<?php

namespace App\Interfaces;

use App\Models\Testimonial;
use Illuminate\Support\Collection;

interface TestimonialsInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): Testimonial;

    public function update(Testimonial $model, array $data): void;

    public function destroy(Testimonial $model): void;

    public function changeStatus(Testimonial $model): void;
}
