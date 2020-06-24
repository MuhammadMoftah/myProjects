<?php

namespace App\Models;
use Image;
use Illuminate\Database\Eloquent\Model;

class AdsImageEditHistory extends AdsImage
{
  protected $fillable = [
        'image', 'ads_id'
    ];

    public function ads()
    {
        return $this->belongsTo(AdsEditHistory::class);
    }

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image_path = $image->store('advertise', 's3');
        // $this->attributes['image'] = $image_path;
        $watermark =  Image::make(public_path('watermark.png'));
        $image_editor = Image::make(public_path($image_path));
        //#1
        $watermarkSize = $image_editor->width() - 20; //size of the image minus 20 margins
        //#2
        $watermarkSize = $image_editor->width() / 2; //half of the image size
        //#3
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($image_editor->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

        // resize watermark width keep height auto
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        //insert resized watermark to image center aligned
        $image_editor->insert($watermark, 'bottom-right');
        //save new image
        $image_editor->save($image_path);

        $this->attributes['image'] = $image_path;
    }
}
