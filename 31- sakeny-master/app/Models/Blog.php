<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'content_ar', 'content_en', 'image', 'views'
    ];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('uploads','s3');
        $this->attributes['image'] = $image;
    }
}
