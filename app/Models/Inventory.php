<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Inventory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function equipment_type(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->where('type', 'image');
    }

    public function mainImage(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('type', 'image')
            ->where('is_main', true);
    }
}
