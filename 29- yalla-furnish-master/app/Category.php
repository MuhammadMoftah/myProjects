<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'category_image', 'slug'
    ];

    public function topics()
    {
        return $this->belongsToMany('App\Topic', 'topic_categories');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_categories');
    }

    public function ideas()
    {
        // return $this->hasMany(Idea::class);
        // return $this->hasMany('App\IdeaCategory', 'category_id');
        return $this->belongsToMany('App\Idea', 'idea_categories');
    }

    public function getCategoryImageAttribute($value)
    {
        if ($value) {
            // return asset('storage/' . $value);
            return env('AWS_URL') . $value;
        }
        // return asset('storage/category.jpg');
        return env('AWS_URL') . 'category.jpg';
    }

    public function setCategoryImageAttribute()
    {
        if (request('category_image')) {
            $image_name = time() . uniqid() . '.' . request('category_image')->getClientOriginalExtension();
            if (!Storage::disk('s3')->put($image_name, File::get(request('category_image')))) {
                throw new \Exception('error in uploading image');
            }

            $this->attributes['category_image'] = $image_name;
        } else {
            $this->attributes['category_image'] = 'category.jpg';
        }
    }
}
