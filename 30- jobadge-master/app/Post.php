<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'company_id', 'image'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'body' => 'required|max:4000',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function validate_image()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function getPostImage()
    {
        return env('AWS_URL') . 'posts/' . $this->image;
    }

    public function uploadPostImage($file)
    {
        // $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_image_path = env('AWS_URL') . 'posts/';
        // if (!$file->move($new_image_path, $imageName)) {
        //     abort(500);
        // }
        // return $imageName;
        
        $imageName = $file->store(
            'posts',
            's3'
        );
        return basename($imageName);  
    }

    public function deletePostImage()
    {
        if ($this->image) {
            // $old_image = env('AWS_URL') . 'posts/' . $this->image;
            // unlink($old_image);
            Storage::disk('s3')->delete('posts/' . $this->image);
        }
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
