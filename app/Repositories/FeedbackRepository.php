<?php

namespace App\Repositories;

use App\Interfaces\FeedbackInterface;
use App\Models\Feedback;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FeedbackRepository implements FeedbackInterface
{

    public function getAll(array $filters): LengthAwarePaginator
    {

        return Feedback::query()

            ->when(
                !empty($filters['full_name']),
                fn ($query) => $query->where(
                    'full_name',
                    'like',
                    '%' . $filters['full_name'] . '%'
                )
            )

            ->when(
                !empty($filters['email']),
                fn ($query) => $query->where(
                    'email',
                    'like',
                    '%' . $filters['email'] . '%'
                )
            )

            ->when(
                !empty($filters['phone']),
                fn ($query) => $query->where(
                    'phone',
                    'like',
                    '%' . $filters['phone'] . '%'
                )
            )

            ->when(
                !empty($filters['page_name']),
                fn ($query) => $query->where(
                    'page_name',
                    $filters['page_name']
                )
            )

            ->when(
                !empty($filters['status']),
                fn ($query) => $query->where(
                    'status',
                    $filters['status']
                )
            )

            ->when(
                !empty($filters['date_from']),
                fn ($query) => $query->whereDate(
                    'preferred_date',
                    '>=',
                    $filters['date_from']
                )
            )

            ->when(
                isset($filters['status']),
                fn ($query) => $query->where(
                    'status',
                    $filters['status']
                )
            )

        ->latest()
        ->paginate(12)
        ->withQueryString();
    }

    public function getPageNames(): Collection {
        return Feedback::query()
            ->select('page_name')
            ->distinct()
            ->get()
            ->pluck('page_name_label', 'page_name');
    }

    public function store(array $data): Feedback
    {
        return Feedback::create($data);
    }

    public function destroy(Feedback $model): bool {
        return $model->delete();
    }

    public function changeStatus(Feedback $model): void {
        $model->update([
            'status' => $model->status == 1 ? 0 : 1
        ]);
    }

}
