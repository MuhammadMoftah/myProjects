<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'content_ar', 'content_en', 'activation', 'url'
    ];

    protected $attributes = [
        'activation' => 1,
    ] ;


}
