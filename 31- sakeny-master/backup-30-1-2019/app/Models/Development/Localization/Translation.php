<?php

namespace App\Models\Development\Localization;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['language_id','translation_key_id','value'];

    public function translation_key()
    {
        return $this->hasOne(TranslationKeys::class,'id' ,'translation_key_id');
    }

    public function setValueController($value)
    {
        $this->attributes['value'] = addslashes($value);
    }
}
