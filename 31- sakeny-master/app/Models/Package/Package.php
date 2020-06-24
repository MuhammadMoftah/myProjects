<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_en', 'name_ar', 'active', 'price', 'description_en',
        'description_ar', 'duration_id', 'duration_type_id', 'ads_type_id', 'free'
    ];

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function durationtype()
    {
        return $this->belongsTo(DurationType::class, 'duration_type_id');
    }

    public function adtype()
    {
        return $this->belongsTo(AdType::class, 'ads_type_id');
    }

    public function scopeFree($query)
    {
        $query->where('free', 1);
    }

    public function scopeNotFree($query)
    {
        $query->where('free', 0);
    }
}
