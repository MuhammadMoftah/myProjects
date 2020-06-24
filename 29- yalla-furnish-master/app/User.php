<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Follow_Users;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\ModelInterfaces\UserInterface;
use App\ChatBlock;

class User extends Authenticatable implements UserInterface, JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'district_id', 'gender', 'email', 'password', 'image', 'content_creator', 'cover',
        'city_id', 'country_id'
    ];

    protected $appends = ['fullname'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isAdmin()
    {
        return false;
    }
    public function pins()
    {
        return $this->morphMany('App\ChatFollow', 'pinnable');
    } // Get the comment's replies . 
    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }
    public function products()
    {
        return $this->belongsToMany('App\Product', 'compare_products');
    }
    public function district()
    {
        return $this->belongsTo('App\Districtes');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function isPinned()
    {
        $pinned = ChatFollow::where([
            'user_id' => CurrentUser()->id,
            'pinnable_id' => $this->id,
            'pinnable_type' => 'App\User',
        ])->first();
        return $pinned;
    }

    public function isBlocked($showroom_id)
    {  // sent showroom_id
        if ($blocked = ChatBlock::where(['user_id' => $this->id,  'showroom_id' => $showroom_id])->first()) {
            return true;
        } else {
            return false;
        }
    }
    public function nonBlocked($showroom_id)
    {  // sent showroom_id
        if ($blocked = ChatBlock::where(['user_id' => $this->id,  'showroom_id' => $showroom_id])->first()) {
            return false;
        } else {
            return true;
        }
    }
    public function boards()
    {
        return $this->hasMany('App\Boards');
    }

    public function scopeCreator($query)
    {
        return $query->where([
            'content_creator' => 1,
        ]);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getImageAttribute($value)
    {
        if (!$value) {
            if (!$this->gender || $this->gender == 'male') {
                // return asset('storage/users_images/male.jpg');
                return env('AWS_URL') . 'users_images/male.jpg';
            } elseif ($this->gender == 'female') {
                // return asset('storage/users_images/female.jpg');
                return env('AWS_URL') . 'users_images/female.jpg';
            }
        }
        // return asset('storage/users_images/' . $value);
        return env('AWS_URL') . 'users_images/' . $value;
    }

    public function getCoverAttribute($value)
    {
        // return asset('storage/users_covers/' . $value);
        return env('AWS_URL') . 'users_covers/' . $value;
    }

    public function setImageAttribute($value)
    {
        $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();

        if (!Storage::disk('s3')->put('users_images/' . $image_name, File::get($value), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['image'] = $image_name;
    }

    public function setCoverAttribute($value)
    {
        $image_name = time() . uniqid() . '.' . $value->getClientOriginalExtension();

        if (!Storage::disk('s3')->put('users_covers/' . $image_name, File::get($value), 'public')) {
            throw new \Exception('error in uploading image');
        }

        $this->attributes['cover'] = $image_name;
    }

    public function check_following($user_id, $follower_id)
    {
        $follow = Follow_users::where('follower_id', $follower_id)->where('following_id', $user_id)->get();
        if ($follow->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function followers_m($id)
    {
        return Follow_Users::where('follower_id', $id)->count();
    }

    public function followings_m($id)
    {
        return Follow_Users::where('following_id', $id)->count();
    }

    public function followers()
    {
        return $this->hasMany('App\Follow_Users', 'following_id');
    }

    public function followings()
    {
        return $this->hasMany('App\Follow_Users', 'follower_id');
    }

    public function getDefaultImage()
    {
        // return asset('storage/users_images/yalla.png');
        return env('AWS_URL') . 'users_images/yalla.png';
    }

    public function consultants()
    {
        return $this->hasMany('App\Consultant');
    }
}
