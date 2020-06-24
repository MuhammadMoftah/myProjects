<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitView extends Model
{
    protected $fillable = [
        'name_ar', 'name_en', 'activation'
    ];

    public function ads()
    {
    	return $this->hasMany(Ads::class, 'unit_view_id', 'id');
    }
}
