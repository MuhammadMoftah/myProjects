<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	protected $fillable = ['title_ar', 'title_en', 'country_id', 'city_id', 'offer_type_id','property_type_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function offer_type()
    {
        return $this->belongsTo(OfferType::class);
    }
    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

}
