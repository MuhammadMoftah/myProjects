<?php

namespace App\Blog\Model;

use Illuminate\Database\Eloquent\Model;

use App\Blog\Model\{
    Blog,
};

class Like extends Model
{
    //
    protected $fillable = [
        "blog_id",
        
    ];

    //
    public function blog(){
        return $this->belongsTo(Blog::class, "blog_id");
    }

    /**
     * Get user share
     */
    public function like()
    {
        return $this->morphTo();
    }
}
