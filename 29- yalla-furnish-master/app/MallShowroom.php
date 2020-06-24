<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MallShowroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mall_id', 'showroom_id'
    ];

    public function showroom()
    {
        return $this->belongsTo('App\Showroom');
    }

    public function mall()
    {
        return $this->belongsTo('App\Mall');
    }
}
