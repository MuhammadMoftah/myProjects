<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
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

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
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
