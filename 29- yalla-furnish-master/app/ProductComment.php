<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\ProductCommentLike;

class ProductComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'comment', 'image'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\ProductCommentReply', 'comment_id');
    }

    public function likes()
    {
        return $this->hasMany('App\ProductCommentLike', 'comment_id');
    }

    public function setImageAttribute($value)
    {
        $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();
        // Storage::disk('s3')->put('messages/' . $imageName, file_get_contents($this->request->image[$i]), 'public');

        if (!Storage::disk('s3')->put('comments/' . $image_name, file_get_contents($value), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['image'] = $image_name;
    }

    public function getImageAttribute($value)
    {
        // return asset('storage/comments/' . $value);
        return env('AWS_URL') . 'comments/' . $value;
    }

    public function checkLike()
    {
        return ProductCommentLike::where([
            'user_id' => auth()->guard('user')->user()->id,
            'comment_id' => $this->id,
        ])->first();
    }
}
