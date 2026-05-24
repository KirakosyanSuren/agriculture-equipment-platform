<?php

namespace App\Services;

use App\Interfaces\TestimonialsInterface;
use App\Models\Testimonial;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class TestimonialsService
{
    public function __construct(
        private TestimonialsInterface $testimonials_repository,
        private FileService $file_service
    ) {}

    public function getAll(): Collection {
        return $this->testimonials_repository->getAll();
    }

    public function getActive(): Collection {
        return $this->testimonials_repository->getActive();
    }

    public function store(array $data): void
    {
        $testimonial_data = Arr::except($data, [
            'image',
        ]);

        $testimonial = $this->testimonials_repository->store($testimonial_data);

        $this->file_service->upload(
            model: $testimonial,
            uploadedFile: $data['image'],
            directory: 'testimonials/' . $testimonial->id,
        );
    }

    public function update(Testimonial $model, array $data): void {

        $testimonial_data = Arr::except($data, [
            'image',
        ]);

        $this->testimonials_repository->update($model, $testimonial_data);

        if (isset($data['image'])) {

            $this->file_service->deleteMany($model->files);

            $this->file_service->upload(
                model: $model,
                uploadedFile: $data['image'],
                directory: 'testimonials/' . $model->id,
            );
        }
    }

    public function destroy(Testimonial $model): void {
        $this->file_service->deleteMany($model->files);
        $this->testimonials_repository->destroy($model);
    }

    public function changeStatus(Testimonial $model): void {
        $this->testimonials_repository->changeStatus($model);
    }
}
