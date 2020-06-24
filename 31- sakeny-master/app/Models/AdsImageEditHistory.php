<?php

namespace App\Models;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AdsImageEditHistory extends AdsImage
{
    protected $fillable = [
        'image', 'ads_id'
    ];

    public function ads()
    {
        return $this->belongsTo(AdsEditHistory::class);
    }
}
