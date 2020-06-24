<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name_ar', 'name_en', 'description_ar', 'description_en', 'price', 'type', 'country_id',
        'number_of_premium_ads', 'number_of_regular_ads', 'number_of_repost_ads', 'number_of_facebook_ads', 'number_of_agents', 'activation'
    ];

    protected $with = ['country'];

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}