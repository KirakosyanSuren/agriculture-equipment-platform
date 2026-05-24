<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getWorkTypeLabelAttribute(): string
    {
        return match($this->work_type){
            'on_site' => 'On Site',
            'hybrid' => 'Hybrid',
            'remote' => 'Remote',
            default => '-'
        };
    }

    public function getEmploymentTypeLabelAttribute(): string
    {
        return match($this->employment_type){
            'full_time' => 'Full Time',
            'part_time' => 'Part Time',
            default => '-'
        };
    }
}
