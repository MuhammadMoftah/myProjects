<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'country_id'
    ];

    protected $table = 'cities';

    public function districtes()
    {
        return $this->hasMany('App\Districtes', 'city_id')->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
