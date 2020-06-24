<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class TopicImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_id', 'image'
    ];

    public function addImageToTopic($image, $topic_id)
    {
        $extension = $image->getClientOriginalExtension();
        $image_name = time() . uniqid() . '.' . $extension;
        $image = Image::make($image);
        if (!Storage::disk('s3')->put('topics/' . $image_name, (string) $image->encode($extension, '70'), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->create([
            'topic_id' => $topic_id,
            'image' => $image_name
        ]);
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function getImageUrl()
    {
        // return asset('storage/topics/' . $this->image);
        return env('AWS_URL') . 'topics/' . $this->image;
    }

    public function getImageAttribute($value)
    {
        return env('AWS_URL') . 'topics/' . $value;
    }
}
