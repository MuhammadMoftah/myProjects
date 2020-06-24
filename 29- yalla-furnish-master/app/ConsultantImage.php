<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConsultantImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consultant_id', 'image'
    ];

    public function consultant()
    {
        return $this->belongsTo('App\Consultant');
    }

    public function setImageAttribute($image)
    {
        $image_name = time() . 'image' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!Storage::disk('s3')->put('consultants/' . $image_name, File::get($image, 'public'))) {
            throw new \Exception('error in uploading image');
        }
        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute($value)
    {
        return env('AWS_URL') . 'consultants/' . $value;
    }
}
