<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class AdsPaymentsApprovals extends Model
{
  protected $fillable = [
        'type','days', 'ad_id'
    ];

    public function ad()
    {
        return $this->belongsTo(Ads::class);
    }
}
