<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Auth\ResetUserPassword;
use App\Http\Controllers\Action\FileController;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    # type == 1 ? user
    # type == 2 ? company
    # type == 3 ? company agent
    # type == 4 ? developer

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'activation', 'type', 'gender',
        'image', 'cover', 'api_token', 'reset_password_code', 'social_id', 'social_type', 'address', 'website',
        'android_token', 'ios_token','company_id'
    ];

    protected $attributes = [
        'image' => 'img/default-profile-picture.png',
        'type' => 3,
        'activation' => 1,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','type','gender','cover','reset_password_code','social_id','social_type','address','website','android_token','ios_token','company_id'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'user_id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class,'owner_id','id');
    }

    public function info()
    {
        return $this->hasOne(AgentInfo::class,'user_id','id');
    }


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
        return ;
    }

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('s3');
        $this->attributes['image'] = $image;
    }


    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function scopeAgent($query)
    {
        $query->whereType(3);
    }






}
