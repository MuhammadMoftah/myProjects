<?php

namespace App\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use App\Blog\Model\{
    Blog,
};

class Comment extends Model
{
    
    protected $fillable = [
        "blog_id",
        "body",
        "comment_type",
        "comment_id"
    ];

    //
    public function blog(){
        return $this->belongsTo(Blog::class, "blog_id");
    }

    /**
     * Get user share
     */
    public function comment()
    {
        return $this->morphTo();
    }
   
    public function scopeActive($query, $stauts = 1)
    {
        return $query->where('is_active', $stauts);
    }
}
