<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Testimonial extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->where('type', 'image');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('type', 'image');
    }
}
