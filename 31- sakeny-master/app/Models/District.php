<?php

namespace App\Models;

use Session;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'country_id', 'activation', 'city_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'district_id', 'id')->active()->BusinessOrder()->Valid();
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public static function getPopularDistricts()
    {
        $country_id = Session::get('country_id');

        $districts = self::select('id', 'name_en', 'name_ar')->where('country_id', $country_id)->active()->with('ads')->get()->sortByDesc(function ($district) {
            return $district->ads->count();
        })->take(6);

        return $districts;
    }
}
