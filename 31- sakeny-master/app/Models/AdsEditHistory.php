<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class AdsEditHistory extends Model
{
    protected $fillable = ['title', 'offer_type_id', 'latitude', 'longitude', 'size', 'property_type_id', 'price',
                            'price_negotiable', 'bedrooms_num', 'bathrooms_num', 'finishing_level',
                            'unit_view_id', 'building_year', 'description',
                            'country_id', 'city_id', 'status','expire_date','is_premium','contact_method','views',
                            'able_call','able_email','able_chat','level_of_finished_id','amenitie_id', 'video','ad_id'];

    protected $appends = ['amenities'];
    //is_premium
    public function setIsPremiumAttribute($is_premium)
    {
        $this->attributes['is_premium'] = $is_premium ? Carbon::now() : null;
    }
    //amenitie_id
    public function setAmenitieIdAttribute($types)
    {
        $this->attributes['amenitie_id'] = collect($types)->toJson();
    }

    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id', 'id');
    }

    public function getAmenitieAttribute() {
        return $this->amenitie_id;
    }

    public function getAmenitiesAttribute()
    {

        return is_array($this->amenitie_id) ?
                Amenities::whereIn('id', $this->amenitie_id)->get() :
                 (is_integer($this->amenitie_id) ? Amenities::where('id', $this->amenitie_id)->get() : []);
    }

    public function images()
    {
        return $this->hasMany(AdsImageEditHistory::class, 'ads_id', 'id');
    }

    public function scopeTimeArrange($query, $time = 'week')
    {
        if ($time == 'today') {
            $query->whereDate('created_at', Carbon::today());
        }elseif($time == 'month') {
            $query->whereDate('created_at', '>=', Carbon::now()->subMonth());
        }elseif($time == 'week') {
            $query->whereDate('created_at', '>=', Carbon::now()->subWeek());
        }
    }
}
