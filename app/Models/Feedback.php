<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Feedback extends Model
{
    protected $guarded = [];
    protected $casts = [
        'status' => 'boolean'
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }

    public function equipment_type(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function getContactTypeLabelAttribute(): string
    {
        return $this->contact_type ?? '-';
    }

    public function getEquipmentTypeNameAttribute(): string
    {
        return $this->equipment_type?->name ?? '-';
    }

    public function getCareerNameAttribute(): string
    {
        return $this->career?->title ?? '-';
    }

    public function getPageNameLabelAttribute(): string
    {
        return match($this->page_name) {
            'maintenance' => 'Maintenance',
            'nationwide_delivery' => 'Nationwide Delivery',
            'money_back_guarantee' => 'Money Back Guarantee',
            'warranty' => 'Warranty',
            'faq' => 'FAQ',
            'careers' => 'Careers',
            'contact_us' => 'Contact Us',
            'product' => 'Product',
            default => '-'
        };
    }
}
