<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow_Users extends Model
{
    protected $table = 'follow_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'following_id', 'follower_id'
    ];

    public function followers()
    {
        return $this->belongsTo('App\User');
    }

    public function followings()
    {
        return $this->belongsTo('App\User');
    }
}
