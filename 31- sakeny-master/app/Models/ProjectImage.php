<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class ProjectImage extends Model
{
    protected $fillable = [
        'image', 'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function setImageAttribute($image)
    {
        if (!$image)
            return;

        $image_name = 'uploads/projects/' . time() . uniqid() . '.' . $image->getClientOriginalExtension();
        $image = Image::make($image->getRealPath());
        $watermark =  Image::make(public_path('watermark.png'));
        $watermarkSize = $image->width() - 20; //size of the image minus 20 margins
        $watermarkSize = $image->width() / 2; //half of the image size
        $resizePercentage = 70; //70% less then an actual image (play with this value)
        $watermarkSize = round($image->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

        // resize watermark width keep height auto
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->insert($watermark, 'bottom-right');

        if (!Storage::disk('s3')->put($image_name, (string) $image->encode(), 'public')) {
            throw new \Exception('error in uploading image');
        }
        $this->attributes['image'] = $image_name;

//        if (!Storage::disk('s3')->put($image_name, File::get($image), 'public')) {
//            throw new \Exception('error in uploading image');
//        }
//
//        $this->attributes['image'] = $image_name;
    }
}
