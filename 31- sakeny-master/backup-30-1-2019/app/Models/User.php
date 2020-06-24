<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\AgentInfo;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Auth\ResetUserPassword;
use App\Http\Controllers\Action\FileController;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    # type == 1 ? user  | can add ad 
    # type == 2 ? company | can add ad 
    # type == 3 ? company agent
    # type == 4 ? developer

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'activation', 'type', 'gender',
        'image', 'cover', 'api_token', 'reset_password_code', 'social_id', 'social_type', 'address', 'website',
        'android_token', 'ios_token','company_id'
    ];

    protected $attributes = [
        'image' => 'img/default-profile-picture.png',
        'type' => 1,
        'activation' => 1,
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store( 
            's3');
        $this->attributes['image'] = $image;
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id', 'user_id');
    }

    public function company_agents()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }

    public function myAgent()
    {
        return $this->belongsTo(AgentInfo::class,'id','user_id');
    }

    public function searchHistory()
    {
        return $this->hasMany(SearchHistory::class, 'user_id', 'id');
    }

    public function compareAds()
    {
        return $this->hasMany(CompareAds::class, 'user_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class,'owner_id','id');
    }

    public function favourite()
    {
        return $this->belongsToMany(Ads::class,'ad_favourites','user_id','ad_id')->withTimestamps();
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
        return ;
    }

    public function scopeUser($query)
    {
        $query->whereType(1);
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function scopeActiveUser($query)
    {
        return $query->user()->active();
    }

    public function scopeCompanyQ($query)
    {
        $query->whereType(2);
    }

    public function scopeAgent($query)
    {
        $query->whereType(3);
    }




}
