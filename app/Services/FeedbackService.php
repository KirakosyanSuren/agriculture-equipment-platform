<?php

namespace App\Services;

use App\Interfaces\FeedbackInterface;
use App\Models\Feedback;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FeedbackService
{

    public function __construct(
        private FeedbackInterface $feedback_repository,
        private FileService $file_service
    ) {}

    public function getAll(array $filters): LengthAwarePaginator
    {
        return $this->feedback_repository->getAll($filters);
    }

    public function getPageNames(): Collection
    {
        return $this->feedback_repository->getPageNames();
    }

    public function store(array $data): void
    {
        $feedback_data = Arr::except($data, [
            'file',
        ]);

        $feedback = $this->feedback_repository->store($feedback_data);

        if(isset($data['file'])) {
            $this->file_service->upload(
                model: $feedback,
                uploadedFile: $data['file'],
                directory: 'documents/' . $feedback->id,
                type: 'document',
            );
        }
    }

    public function destroy(Feedback $model): bool
    {
        $this->file_service->deleteMany($model->files);
        return $this->feedback_repository->destroy($model);
    }

    public function changeStatus(Feedback $model): void
    {
        $this->feedback_repository->changeStatus($model);
    }
}
