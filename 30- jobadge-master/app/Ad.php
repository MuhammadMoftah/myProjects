<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'image', 'approved'
    ];

    public function getCreateRules()
    {
        return [
            'body' => 'required|max:4000',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function getUpdateRules()
    {
        return [
            'body' => 'required|max:4000',
        ];
    }

    public function validate_image()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function getAdImage()
    {
        return env('AWS_URL') . 'ads/' . $this->image;
    }

    public function uploadAdImage($file)
    {
        // $file = $this->request->image;
        // $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_image_path = env('AWS_URL') . 'ads/';
        // if (!$file->move($new_image_path, $imageName)) {
        //     abort(500);
        // }
        $imageName = $file->store(
            'ads',
            's3'
        );
        return basename($imageName);  
    }

    public function deleteAdImage()
    {
        // $old_image = env('AWS_URL')  . 'ads/' . $this->image;
        // unlink($old_image);
        Storage::disk('s3')->delete('ads/' . $this->image);
    }
}
