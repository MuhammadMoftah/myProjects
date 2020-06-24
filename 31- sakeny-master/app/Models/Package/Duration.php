<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $fillable = [
        'name_en', 'name_ar', 'duration'
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
