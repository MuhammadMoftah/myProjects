<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IdeaReplyLike;

class IdeaCommentReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_id', 'user_id', 'reply'
    ];

    public function comment()
    {
        return $this->belongsTo('App\IdeaComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\IdeaReplyLike', 'reply_id');
    }

    public function checkLike()
    {
        return IdeaReplyLike::where([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $this->id,
        ])->first();
    }

    // using deleting event to delete relation
    public static function boot() {
        parent::boot(); 
        static::deleting(function($reply) { // before delete() method call this
              $reply->likes()->delete(); // delete likes
         });
    }
}
