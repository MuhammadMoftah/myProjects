<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Facades\Storage;

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
        if (is_string($image)) {
            $this->attributes['image'] = $image;
            return;
        } else {
            if (!$image)
                return;

            //        $image_name = 'uploads/advertise/' . time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_name = 'uploads/adds/' . time() . uniqid() . '.' . $image->getClientOriginalExtension();
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
        }
    }

    public function getCreateRules($request)
    {
        $images = count((array) $request->images);

        if ($images > 0) {
            foreach ($request->images as $key => $index) {
                $rules['images.' . $key] = 'required|image|mimes:jpeg,png,jpg|max:6144';
            }
        }

        return $rules;
    }

    public function addImageToAd($image, $id)
    {
        $this->create([
            'ads_id' => $id,
            'image' => $image,
        ]);
    }

    public function deleteImage()
    {
        Storage::disk('s3')->delete($this->image);
    }
}
