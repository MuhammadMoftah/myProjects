<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeBanner extends Model
{
    protected $fillable = ['image', 'link', 'active', 'type'];

    public function setImageAttribute($image)
    {
        if (!$image) {
            return;
        }

        $image_name = time() . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('s3')->put('uploads/home_banners/' . $image_name, File::get($image), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute($image)
    {
        return env('AWS_URL') . 'uploads/home_banners/' . $image;
    }
}
