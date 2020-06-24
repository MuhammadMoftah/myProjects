<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class ProductImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'image'
    ];

    public function addImageToProduct($image, $product_id)
    {
        $this->create([
            'product_id' => $product_id,
            'image' => $image
        ]);
    }

    public function setImageAttribute($value)
    {
        $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();
        $image = Image::make($value);
        $image->insert(public_path('images/logo.png'), 'bottom-left', 10, 10);
        if (!Storage::disk('s3')->put('products/' . $image_name, (string) $image->encode($value->getClientOriginalExtension(), '70'), 'public')) {
            throw new \Exception('error in uploading image');
        }
        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute($value)
    {
        // return asset('storage/products/' . $value);
        return env('AWS_URL') . 'products/' . $value;
    }
}
