<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Paragraph extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_ar', 'description_en', 'description_ar', 'image', 'position', 'active', 'idea_id', 'youtube_link'
    ];

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function setImageAttribute($value)
    {
        if (!$value) {
            return;
        }

        $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();

        if (!Storage::disk('s3')->put('paragraphs/' . $image_name, File::get($value), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute($value)
    {
        return env('AWS_URL') . 'paragraphs/' . $value;
    }
}
