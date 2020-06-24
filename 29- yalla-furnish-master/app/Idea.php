<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Idea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'idea_image', 'user_id', 'active', 'reason',
    ];

    protected $table = 'ideas';

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'idea_categories')->withTrashed();
    }

    public function saves()
    {
        return $this->hasMany('App\SavedItem');
    }

    public function shares()
    {
        return $this->hasMany('App\Share', 'item_id')->where('type', 'idea');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'item_id')->where('type', 'idea');
    }

    public function updates()
    {
        return $this->hasMany('App\UserUpdate');
    }

    public function paragraphs()
    {
        return $this->hasMany('App\Paragraph');
    }

    public function activeParagraphs()
    {
        return $this->hasMany('App\Paragraph')->active();
    }

    public function userLike()
    {
        $user_id = auth()->guard('user')->user()->id;
        return $this->hasOne('App\Like', 'item_id')->where([
            'user_id' => $user_id,
            'type' => 'idea',
        ]);
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault([
            'name' => 'Yalla-Furnish',
        ]);
    }

    public function setIdeaImageAttribute($value)
    {
        if (request()->hasFile('idea_image')) {
            $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();

            if (!Storage::disk('s3')->put('ideas/' . $image_name, File::get($value), 'public')) {
                throw new \Exception('error in uploading image');
            }

            $this->attributes['idea_image'] = $image_name;
        }
    }

    public function getIdeaImageAttribute($value)
    {
        // return asset('storage/ideas/' . $value);
        return env('AWS_URL') . 'ideas/' . $value;
    }

    public function getMiniDescriptionAttribute()
    {
        if ($this->activeParagraphs->first()) {
            return substr($this->activeParagraphs->first()->description_en, 0, 300) . "...";
        } else {
            return "";
        }
    }

    public function comments()
    {
        return $this->hasMany('App\IdeaComment')->latest();
    }
}
