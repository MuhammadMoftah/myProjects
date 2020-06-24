<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderImage extends Model
{
    protected $fillable = ['image', 'active'];

    public function getCreateAndUpdateRules()
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:6144'
        ];
    }

    public function getImageUrl()
    {
        return  env('AWS_URL').'uploads/covers/' . $this->image;
    }

    public function upload_image($image)
    {
        // $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
        // $new_image_path = public_path() . '/uploads/covers/';
        // $image->move($new_image_path, $image_name);
        $image = $image->store('uploads/covers', 's3');
        return basename($image);
    }

    public function delete_image()
    {
        if ($this->image) {
            $old_image = env('AWS_URL') . 'covers/' . $this->image;
            unlink($old_image);
        }
    }
}
