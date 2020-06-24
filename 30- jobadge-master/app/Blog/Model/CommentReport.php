<?php

namespace App\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use App\Blog\Model\{
    Comment,
};

class CommentReport extends Model
{
    //
    protected $fillable = [
        "comment_id",
        "body",
        "is_seen"
    ];

    //
    public function comment(){
        return $this->belongsTo(Comment::class, "comment_id");
    }

    // scope for not seen report
    public function scopeInvisible($query, $seen = 0)
    {
        return $query->where('is_seen', $seen);
    }

    /**
     * Get user share
     */
    public function commentReport()
    {
        return $this->morphTo();
    }
}
