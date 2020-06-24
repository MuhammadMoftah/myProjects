<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TopicReplyLike;

class TopicCommentReply extends Model
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
        return $this->belongsTo('App\TopicComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\TopicReplyLike', 'reply_id');
    }

    public function checkLike()
    {
        return TopicReplyLike::where([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $this->id,
        ])->first();
    }
}
