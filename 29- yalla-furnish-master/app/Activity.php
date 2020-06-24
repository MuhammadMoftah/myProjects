<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['user_id', 'activity'];

    public function users()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function showrooms()
    {
        return $this->hasMany('App\Showroom', 'id', 'showroom_id');
    }
}
