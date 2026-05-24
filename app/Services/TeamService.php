<?php

namespace App\Services;

use App\Interfaces\TeamInterface;
use App\Models\TeamMember;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class TeamService
{
    public function __construct(
        private TeamInterface $team_repository,
        private FileService $file_service
    ) {}

    public function getAll(): Collection {
        return $this->team_repository->getAll();
    }

    public function getActive()
    {
        return $this->team_repository->getActive();
    }

    public function store(array $data): void {

        $team_data = Arr::except($data, [
            'image',
        ]);

        $team_member = $this->team_repository->store($team_data);

        $this->file_service->upload(
            model: $team_member,
            uploadedFile: $data['image'],
            directory: 'teams/' . $team_member->id,
        );

    }

    public function update(TeamMember $model, array $data): void
    {

        $team_data = Arr::except($data, [
            'image',
        ]);

        $this->team_repository->update($model, $team_data);

        if (isset($data['image'])) {

            $this->file_service->deleteMany($model->files);

            $this->file_service->upload(
                model: $model,
                uploadedFile: $data['image'],
                directory: 'teams/' . $model->id,
            );
        }
    }

    public function destroy(TeamMember $model): bool {
        $this->file_service->deleteMany($model->files);
        return $this->team_repository->destroy($model);
    }

    public function changeStatus(TeamMember $model): void {
        $this->team_repository->changeStatus($model);
    }
}
