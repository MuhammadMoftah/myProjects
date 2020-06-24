<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
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

        if (request()->route()->getName() == "admin.jobtypes.edit.post") {
            $rules['slug'] = 'required|max:300|unique:job_types,slug,' . request('id');
        }

        return $rules;
    }

    public function jobs()
    {
        return $this->hasMany('App\Job', 'jobtype_id')->where([
            'approve' => 1,
            'draft' => 0,
            'close' => 0
        ]);
    }

    public function targets()
    {
        return $this->hasMany('App\TargetJob', "jobtype_id", "id");
    }
}
