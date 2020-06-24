<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- This is required

class Topic extends Model
{
    use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'link', 'user_id',
    ];
    protected $dates = ['created_at'];
    protected $append = ['user_image', 'user_name'];

    public function getPostTopicValidate()
    {
        $rules = [
            'body' => 'required|max:4000',
            'categories' => 'array|min:1|max:3',
            'images' => 'array|min:1|max:5',
            'categories' => 'required|array|min:1|max:3',
            'images' => 'required|array|min:1|max:5',
            'categories.*' => 'required|distinct',
            'images.*' => 'required|distinct',
        ];

        request('link') ? $rules['link'] = 'required|url' : '';

        $categories_count = count((array) request('categories'));

        if ($categories_count > 0) {
            foreach (request('categories') as $key => $value) {
                $rules['categories.' . $key] = 'required|exists:categories,id';
            }
        }

        $images_count = count((array) request('images'));

        if ($images_count > 0) {
            foreach (request('images') as $key => $value) {
                $rules['images.' . $key] = 'required|image|mimes:jpeg,png,jpg|max:5000';
            }
        }

        return $rules;
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'topic_categories')->withTrashed();
    }

    public function images()
    {
        return $this->hasMany('App\TopicImage');
    }

    public function comments()
    {
        return $this->hasMany('App\TopicComment')->latest();
    }

    public function commentsNormal()
    {
        return $this->hasMany('App\TopicComment');
    }

    public function getCommentsWithDistinct($user_id)
    {
        $users =  $this->commentsNormal()->select("user_id")->whereNotIn("user_id", [$this->user_id, $user_id])->distinct('user_id')
            ->pluck('user_id');
        return  User::whereIn("id", $users)->get();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function saves()
    {
        return $this->hasMany('App\SavedItem');
    }

    public function shares()
    {
        return $this->hasMany('App\Share', 'item_id')->where('type', 'topic');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'item_id')->where('type', 'topic');
    }

    public function updates()
    {
        return $this->hasMany('App\UserUpdate');
    }

    public function userLike()
    {
        $user_id = auth()->guard('user')->user()->id;
        return $this->hasOne('App\Like', 'item_id')->where([
            'user_id' => $user_id,
            'type' => 'topic',
        ]);
    }

    public function getUserImageAttribute()
    {
        if ($this->user) {
            return $this->user->image;
        }

        // return asset('storage/users_images/yalla.png');
        return env('AWS_URL') . 'users_images/yalla.png';
    }

    public function getUserNameAttribute()
    {
        if ($this->user) {
            return $this->user->fullname;
        }

        return 'Yalla Furnish';
    }
}
