<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $fillable = ['name_ar', 'name_en', 'image', 'country_id', 'activation','price_per_meter','number_ads','is_home'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function ads()
    {
        return $this->hasMany(Ads::class,'city_id','id');
    }

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('s3');
        $this->attributes['image'] = $image;
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

}
