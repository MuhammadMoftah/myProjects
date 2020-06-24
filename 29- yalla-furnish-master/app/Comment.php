<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Comment extends Model
{
    protected $fillable = ['commentable_id', 'commentable_type', 'body', 'user_id'];
    protected $hidden = ['updated_at']; // hidden column  

    public function commentable()
    {
        return $this->morphTo();
    }
    // Get the owning commentable model.
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // Get the comment's owner .  
    public function likes()
    {
        return $this->hasMany('App\Like', 'item_id');
    }
    // Get the comment's likes . 
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    // Get the comment's image . 
    public function replies()
    {
        return $this->morphMany('App\Reply', 'repliable');
    }
    // Get the comment's replies . 
    // Get the owning commentable type modified. 
    public function getCommentableTypeAttribute($value)
    {
        if ($value === 'App\ShowroomReview') {
            return 'showroom_review';
        }
    }
    //  check if the use id liked this comment or not
    public function checkLike()
    {
        return Like::where([
            'user_id' => auth('user')->user()->id,
            'item_id' => $this->id,
            'type' => 'comment',
        ])->first();
    }
    // using deleting event to delete relation
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($comment) { // before delete() method call this
            $comment->likes()->delete(); // delete likes
            $comment->image()->delete(); // delete image
            $comment->replies()->delete(); // delete replies
        });
    }
}
