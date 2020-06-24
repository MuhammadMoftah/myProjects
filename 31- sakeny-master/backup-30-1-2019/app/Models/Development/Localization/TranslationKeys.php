<?php

namespace App\Models\Development\Localization;

use Illuminate\Database\Eloquent\Model;

class TranslationKeys extends Model
{
    protected $fillable = ['name','insertion_type','status'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'translation_key_id', 'id');
    }
}
