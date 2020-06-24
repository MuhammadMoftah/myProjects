<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePayment extends Model
{
    protected $fillable = ['package_id', 'company_id' ,'payment_gateway','status'];
    protected $appends = ['company_package'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class ,'company_id' ,'user_id');
    }

    public function getCompanyPackageAttribute()
    {
        return $this->package()->first();
    }

}
