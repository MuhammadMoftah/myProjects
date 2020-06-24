<?php

namespace App\Models\Development\Localization;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name','activation','build_at'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'language_id', 'id');
    }


    public function scopeActive($query)
    {
        $query->where('activation',1);
    }
}
