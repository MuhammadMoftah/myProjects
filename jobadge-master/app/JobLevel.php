<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'slug'
    ];

    public function getCreateAndUpdateRules()
    {
        $rules = [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200'
        ];

        if (request()->route()->getName() == "admin.joblevels.edit.post") {
            $rules['slug'] = 'required|max:300|unique:job_levels,slug,' . request('id');
        }

        return $rules;
    }

    public function jobs()
    {
        return $this->hasMany('App\Job', 'joblevel_id');
    }
}
