<?php

namespace App\Repositories;

use App\Interfaces\FaqInterface;
use App\Models\Faq;
use Illuminate\Support\Collection;

class FaqRepository implements FaqInterface
{

    public function getAll(): Collection
    {
        return Faq::latest()->get();
    }

    public function getActive(): Collection {
        return Faq::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();
    }

    public function store(array $data): void {

        Faq::create([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'sort_order' => $data['sort_order']
        ]);
    }

    public function update(Faq $model, array $data): void
    {

        $model->update([
            'question' => $data['question'],
            'answer' => $data['answer'],
            'sort_order' => $data['sort_order']
        ]);
    }

    public function destroy(Faq $model): bool
    {
        return $model->delete();
    }

    public function changeStatus(Faq $model): void
    {
        $model->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
    }

}
