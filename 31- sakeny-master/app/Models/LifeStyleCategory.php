<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeStyleCategory extends Model
{
    protected $fillable = [
        'name_ar', 'name_en'
    ];

    public function lifestyle()
    {
        return $this->hasMany(LifeStyle::class, 'category_id', 'id');
    }
}
