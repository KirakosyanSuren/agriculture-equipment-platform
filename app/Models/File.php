<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{

    protected $guarded = [];

    protected $casts = [
        'is_main' => 'boolean',
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
