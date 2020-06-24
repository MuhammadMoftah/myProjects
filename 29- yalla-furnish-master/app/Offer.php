<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['expire_date', 'discount', 'start_date', 'product_id'];

    protected $append = ['offer_price'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expire_date', 'start_date'];

    public function getOfferPriceAttribute()
    {
        $old_price = $this->product->price;

        return round($old_price * (1 - ($this->discount / 100)));
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function saves()
    {
        return $this->hasMany('App\SavedItem');
    }

    public function scopeActive($query)
    {
        $now = Carbon::now()->toDateTimeString();

        $query->where('start_date', '<=', $now)->where('expire_date', '>', $now);
    }

    public function setExpireDateAttribute($value)
    {
        $this->attributes['expire_date'] = Carbon::parse($value)->toDateTimeString();
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->toDateTimeString();
    }
}
