<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCommentLike extends Model
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
        return $this->belongsTo('App\ProductComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
