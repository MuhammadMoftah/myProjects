<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'no_of_posts', 'no_of_jobs', 'price', 'feature1_en', 'feature1_ar', 'feature2_en', 'feature2_ar', 'feature3_en', 'feature3_ar'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'no_of_posts' => 'required|numeric|min:1|digits_between:1,9',
            'no_of_jobs' => 'required|numeric|min:1|digits_between:1,9',
            'price' => 'required|numeric|min:1|digits_between:1,9',
            'feature1_en' => 'required|max:4000',
            'feature1_ar' => 'required|max:4000',
            'feature2_en' => 'required|max:4000',
            'feature2_ar' => 'required|max:4000',
            'feature3_en' => 'required|max:4000',
            'feature3_ar' => 'required|max:4000',
        ];
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
