<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['name','activation','place','start_date','end_date','code','image','url','type','country_id','city_id','page'];
    // protected $hidden = ['start_date', 'end_date'];

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('banners', 's3');
        $this->attributes['image'] = $image;
    }

    public function scopeActive($query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $query->where('activation', 1)
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date);
    }

    public function scopeHead($query)
    {
        return $query->active()->where('place', 1)->inRandomOrder()->limit(1);
    }

    public function scopeMiddle($query)
    {
        return $query->active()->where('place', 2)->inRandomOrder()->limit(2);
    }

    public function scopeRightSide($query)
    {
        return $query->active()->where('place', 3)->inRandomOrder()->limit(1);
    }

    public function scopeLeftSide($query)
    {
        return $query->active()->where('place', 4)->inRandomOrder()->limit(1);
    }






}
