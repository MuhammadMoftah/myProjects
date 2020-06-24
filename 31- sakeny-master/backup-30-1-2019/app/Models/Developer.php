<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\Auth\ResetUserPassword;
use App\Http\Controllers\Action\FileController;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Developer extends Authenticatable
{
    use Notifiable;

    # type == 1 ? user
    # type == 2 ? company
    # type == 3 ? company agent
    # type == 4 ? developer

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'activation', 'type', 'gender',
        'image', 'cover', 'api_token', 'reset_password_code', 'social_id', 'social_type', 'address', 'website',
        'android_token', 'ios_token'
    ];

    protected $attributes = [
        'image' => 'img/default-profile-picture.png',
        'type' => 4,
        'activation' => 1,
    ];

    protected $table = 'users';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $appends = [
    ];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('s3');
        $this->attributes['image'] = $image;
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
        return ;
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'developer_id', 'id');
    }

    public function scopeDeveloper($query)
    {
        $query->whereType(4);
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }


}
