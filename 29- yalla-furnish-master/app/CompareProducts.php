<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompareProducts extends Model
{
    protected $fillable = ['product_id', 'user_id'];

    public function product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
