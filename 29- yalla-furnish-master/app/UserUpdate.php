<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUpdate extends Model
{
    protected $fillable = ['user_id', 'product_id', 'idea_id', 'topic_id', 'showroom_id','offer_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function showroom()
    {
        return $this->belongsTo('App\Showroom');
    }

    public function offer()
    {
        return $this->belongsTo('App\Product');
    }
}
