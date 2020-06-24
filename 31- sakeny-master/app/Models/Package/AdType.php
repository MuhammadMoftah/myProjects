<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdType extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'no_of_special_ads', 'no_of_repeated_ads', 'no_of_normal_ads', 'no_of_seo_ads', 'name_ar', 'name_en'
    ];
}
