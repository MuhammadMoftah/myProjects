<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

class DurationType extends Model
{
    protected $fillable = [
        'name_en', 'name_ar', 'duration_id'
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
}
