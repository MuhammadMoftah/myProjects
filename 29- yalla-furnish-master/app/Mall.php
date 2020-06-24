<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Mall extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'cover', 'about', 'facebook', 'instagram',
        'twitter', 'location', 'opening_hours', 'lat', 'lng', 'active'
    ];

    public function showrooms()
    {
        return $this->belongsToMany('App\Showroom', 'mall_showrooms')->active()->approve()->latest();
    }

    public function setName($value)
    {
        $this->attrbutes['name'] = $value;
    }

    public function setAbout($value)
    {
        $this->attrbutes['about'] = $value;
    }

    public function setImageAttribute($image)
    {
        if (!$image) {
            return;
        }

        $image_name = time() . 'image' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!Storage::disk('s3')->put('malls/' . $image_name, File::get($image, 'public'))) {
            throw new \Exception('error in uploading image');
        }

        if (request()->route()->getName() == 'admin.malls.edit.post') {
            $old_image = $this->getOriginal('image');
            Storage::disk('s3')->delete('malls/' . $old_image);
        }

        $this->attributes['image'] = $image_name;
    }

    public function setCoverAttribute($cover)
    {
        if (!$cover) {
            return;
        }

        $image_name = time() . 'image' . uniqid() . '.' . $cover->getClientOriginalExtension();
        if (!Storage::disk('s3')->put('malls/' . $image_name, File::get($cover, 'public'))) {
            throw new \Exception('error in uploading image');
        }

        if (request()->route()->getName() == 'admin.malls.edit.post') {
            $old_cover = $this->getOriginal('cover');
            Storage::disk('s3')->delete('malls/' . $old_cover);
        }

        $this->attributes['cover'] = $image_name;
    }

    public function getName($value)
    {
        return $value;
    }

    public function getAbout($value)
    {
        return $value;
    }

    public function getImageAttribute($image)
    {
        return env('AWS_URL') . 'malls/' . $image;
    }

    public function getCoverAttribute($cover)
    {
        return env('AWS_URL') . 'malls/' . $cover;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
