<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentLike extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_id', 'user_id'
    ];

    public function comment()
    {
        return $this->belongsTo('App\TopicComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
