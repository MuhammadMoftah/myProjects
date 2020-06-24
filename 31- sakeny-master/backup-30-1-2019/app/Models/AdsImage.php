<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

class AdsImage extends Model
{
    protected $fillable = [
        'image', 'ads_id'
    ];

    public function ads()
    {
    	return $this->belongsTo(Ads::class);
    }

    public function setImageAttribute($image)
    {
       if (!$image)
            return;
        // $this->attributes['image'] = $image_path;
        $watermark =  Image::make(public_path('watermark.png'));
        $image_editor = Image::make($image);
        //#1
        $watermarkSize = $image_editor->width() - 20; //size of the image minus 20 margins
        //#2
        $watermarkSize = $image_editor->width() / 2; //half of the image size
        //#3
        $resizePercentage = 70; //70% less then an actual image (play with this value)
        $watermarkSize = round($image_editor->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image
        // resize watermark width keep height auto
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        //insert resized watermark to image center aligned
        $image_editor->insert($watermark, 'bottom-right');
        $image_path = $image_editor->store('advertise', 's3');
        //save new image
        // $image_editor->save($image_path);
        $this->attributes['image'] = $image_path;
    }
}
