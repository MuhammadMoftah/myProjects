<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200'
        ];
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function experiences()
    {
        return $this->hasMany('App\WorkExperience');
    }

    public function targets()
    {
        return $this->hasMany('App\TargetJob');
    }
}
