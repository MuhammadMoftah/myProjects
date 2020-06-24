<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'image', 'activation', 'latitude', 'longitude', 'currency_ar' ,'currency_en','price_for_special_ads','number_of_days_for_special_ads','price_for_bump_up_ads','number_of_days_for_bump_up_ads','number_of_days_for_trial_package','number_of_ads_for_trial_package'];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('uploads','s3');
        $this->attributes['image'] = $image;
    }

    public function cities()
    {
    	return $this->hasMany(City::class);
    }

}
