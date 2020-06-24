<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompareAds extends Model
{
    protected $fillable = [
        'title', 'ads_ids', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
