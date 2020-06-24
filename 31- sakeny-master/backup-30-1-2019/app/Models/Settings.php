<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'description_ar', 'description_en', 'keywords_ar', 'keywords_en', 'email', 'phone','cover','facebook','twitter','youtube','instgram','view_company_registration_page'
    ];

    public function setCoverAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('s3');
        $this->attributes['cover'] = $image;
    }
}
