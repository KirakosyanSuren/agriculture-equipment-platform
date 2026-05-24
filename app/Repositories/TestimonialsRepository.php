<?php

namespace App\Repositories;

use App\Interfaces\TestimonialsInterface;
use App\Models\Testimonial;
use Illuminate\Support\Collection;

class TestimonialsRepository implements TestimonialsInterface
{
    public function getAll(): Collection {
        return Testimonial::latest()->get();
    }

    public function getActive(): Collection {
        return Testimonial::where('is_active', 1)->latest()->get();
    }

    public function store(array $data): Testimonial {
        return Testimonial::create($data);
    }

    public function update(Testimonial $model, array $data): void {
        $model->update($data);
    }

    public function destroy(Testimonial $model): void {
        $model->delete();
    }

    public function changeStatus(Testimonial $model): void {
        $model->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
    }
}
