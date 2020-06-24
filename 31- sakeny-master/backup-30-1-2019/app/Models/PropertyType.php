<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PropertyType extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    protected $fillable = [
        'name_ar', 'name_en', 'activation'
    ];

    public function ads()
    {
    	return $this->hasMany(Ads::class, 'property_type_id', 'id');
    }

}
