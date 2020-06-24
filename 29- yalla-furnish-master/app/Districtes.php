<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Districtes extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'city_id'
    ];

    protected $table = 'districtes';

    public function city()
    {
        return $this->belongsTo('App\City')->withTrashed();
    }
}
