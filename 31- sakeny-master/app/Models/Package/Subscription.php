<?php

namespace App\Models\Package;

use App\Models\Company;
use App\Models\Package\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'company_id', 'active', 'start_date', 'end_date', 'no_of_seo_ads',
        'no_of_repeated_ads', 'no_of_special_ads', 'no_of_normal_ads', 'package', 'package_id', 'approve', 'deactivate_date'
    ];

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function getPackageAttribute($value)
    {
        return json_decode($value);
    }

    public function setPackageAttribute($value)
    {
        $this->attributes['package'] = json_encode($value);
    }

    public function packageObj()
    {
        return $this->belongsTo(Package::class, 'package_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function scopeApprove($query)
    {
        return $query->where('approve', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
