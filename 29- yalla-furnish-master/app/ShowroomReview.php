<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowroomReview extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');  
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'item_id')->where('type', 'showroom_review');
    } 
 
    // Get all of the showroom_review's comments. 
    public function comments() {  return $this->morphMany('App\Comment', 'commentable'); }

    public function userLike()
    {
        $user_id = auth()->guard('user')->user()->id;
        return $this->hasOne('App\Like', 'item_id')->where([
            'user_id' => $user_id,
            'type' => 'showroom_review',
        ]);
    }
}
