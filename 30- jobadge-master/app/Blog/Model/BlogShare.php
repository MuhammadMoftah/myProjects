<?php

namespace App\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use App\Blog\Model\{
    Blog,
};

class BlogShare extends Model
{
    //
    protected $fillable = [
        "blog_id",
        "type",
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, "blog_id");
    }

    /**
     * Get user share
     */
    public function shareable()
    {
        return $this->morphTo();
    }
}
