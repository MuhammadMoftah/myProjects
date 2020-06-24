<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductReplyLike;

class ProductCommentReply extends Model
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
        return $this->belongsTo('App\ProductComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\ProductReplyLike', 'reply_id');
    }

    public function checkLike()
    {
        return ProductReplyLike::where([
            'user_id' => auth()->guard('user')->user()->id,
            'reply_id' => $this->id,
        ])->first();
    }
}
