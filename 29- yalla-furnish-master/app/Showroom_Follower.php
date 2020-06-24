<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showroom_Follower extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'showroom_id'
    ];

    protected $table = 'showrooms_followers';

    public function showroom()
    {
        return $this->belongsTo('App\Showroom','showroom_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
