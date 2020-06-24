<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
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

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
