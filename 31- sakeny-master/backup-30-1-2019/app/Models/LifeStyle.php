<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeStyle extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'description_ar', 'description_en', 'image', 'category_id', 'views'
    ];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('s3');
        $this->attributes['image'] = $image;
    }

    public function category()
    {
        return $this->belongsTo(LifeStyleCategory::class);
    }

}
