<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    protected $fillable = [
        'address_ar', 'address_en', 'working_to', 'working_from', 'mob1', 'mob2', 'lat', 'lang', 'showroom_id', 'city_id', 'district_id', 'title'
    ];

    public function showroom()
    {
        return $this->belongsTo('App\Showroom')->withTrashed();
    }

    public function info()
    {
        return $this->hasMany('App\BranchInfo');
    }

    public function city()
    {
        return $this->belongsTo('App\City')->withTrashed();
    }

    public function district()
    {
        return $this->belongsTo('App\Districtes')->withTrashed();
    }
}
