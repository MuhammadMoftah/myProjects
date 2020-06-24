<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaReplyLike extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reply_id', 'user_id'
    ];

    public function reply()
    {
        return $this->belongsTo('App\IdeaCommentReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
