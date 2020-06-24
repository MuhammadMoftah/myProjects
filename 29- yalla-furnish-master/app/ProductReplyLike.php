<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReplyLike extends Model
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
        return $this->belongsTo('App\ProductCommentReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
