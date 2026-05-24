<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    public function upload(
        Model $model,
        UploadedFile $uploadedFile,
        string $directory = 'uploads',
        string $type = 'image',
        bool $isMain = false,
    ): File {

        $filename = Str::uuid() . '.' . $uploadedFile->extension();
        $path = $uploadedFile->storeAs(
            $directory,
            $filename,
            'public'
        );

        return $model->files()->create([
            'path' => $path,
            'original_name' => $uploadedFile
                ->getClientOriginalName(),
            'mime_type' => $uploadedFile
                ->getMimeType(),
            'size' => $uploadedFile
                ->getSize(),
            'type' => $type,
            'is_main' => $isMain,
        ]);
    }

    public function uploadMany(
        Model $model,
        array $files,
        string $directory = 'uploads',
        string $type = 'image',
        ?int $mainIndex = null,
    ): void {

        foreach ($files as $index => $file) {

            $this->upload(
                model: $model,
                uploadedFile: $file,
                directory: $directory,
                type: $type,
                isMain: $index == $mainIndex,
            );
        }
    }

    public function delete(File $file): void
    {
        Storage::disk('public')
            ->delete($file->path);

        $directory = dirname($file->path);

        if (empty(Storage::disk('public')->files($directory))) {

            Storage::disk('public')->deleteDirectory($directory);

        }

        $file->delete();
    }

    public function deleteMany(iterable $files): void
    {
        foreach ($files as $file) {

            $this->delete($file);
        }
    }
}
