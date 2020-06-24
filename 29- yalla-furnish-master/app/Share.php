<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['item_id', 'user_id', 'type'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'item_id')->where('type', 'product');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'item_id')->where('type', 'topic');
    }

    public function idea()
    {
        return $this->belongsTo('App\Idea', 'item_id')->where('type', 'idea');
    }
}
