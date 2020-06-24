<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = ['registered_name', 'description', 'cr_number', 'cr_number_file',
    						 'phone', 'city', 'zip_code', 'num_agents', 'logo', 'user_id', 'status',
                             'number_of_premium_ads','number_of_regular_ads','number_of_agents','number_of_repost',
                            'in_registration','view_in_front','country_id','trial_expire_date'];


    protected $appends = ['user_info' ,'package'];

    public function setCrNumberFileAttribute($cr_number_file)
    {
        if (!$cr_number_file)
            return;
        $cr_number_file = $cr_number_file->store('comapnies','s3');
        $this->attributes['cr_number_file'] = $cr_number_file;
    }

    public function setLogoAttribute($logo)
    {
        if (!$logo)
            return;
        $logo = $logo->store('comapnies', 's3');
        $this->attributes['logo'] = $logo;
    }

    public function user()
    {
   		return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(PackagePayment::class,'company_id','user_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function getUserInfoAttribute()
    {
        return $this->user()->first();
    }

    public function getPackageAttribute()
    {
        return $this->payments()->first();
    }

    public function hasMorePoints($column)
    {
        return $this->$column > 0 ? true : false;
    }

    public function decrementPoints($column, $decrements = 1)
    {
        return $this->decrement($column,$decrements);
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

    public function scopeTrialValid($query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $query->orderBy('id','DESC')->whereDate('trial_expire_date', '>=', $date);
    }

    public function scopeTrialExpired($query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $query->whereDate('trial_expire_date', '<=', $date);
    }

    public function updateTrial($days = 90)
    {
        $date = Carbon::now()->addDays($days)->format('Y-m-d');
        $activity = $this->update(['trial_expire_date'=>$date]);
    }
}
