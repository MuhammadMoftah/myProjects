<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageService
{
    private $product_image_model;
    private $request;

    public function __construct()
    {
        $this->product_image_model = new ProductImage();
        $this->request = new Request();
    }

    public function getSingleImage($id)
    {
        return $this->product_image_model->findOrFail($id);
    }

    public function addImage($image, $product_id)
    {
        $this->product_image_model->create([
            'product_id' => $product_id,
            'image' => $image,
        ]);
    }

    public function deleteImage($id)
    {
        $image = $this->getSingleImage($id);
        Storage::disk('s3')->delete("products/" . $image->image);
        $image->delete();
    }
}
