<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TargetJob extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category_id', 'industry_id', 'country_id', 'user_id', 'city_id', 'jobtype_id', 'salary_from', 'salary_to'
            ,"show_salary"
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'title' => ['required', 'max:200'],
            'categories'   => 'required|array|min:1',
            "categories.*" => 'required|exists:categories,id',
            'industries'   => 'required|array|min:1',
            "industries.*" => 'required|exists:industries,id',
            'jobtype_id' => 'required|exists:job_types,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'salary_from' => 'required|numeric|digits_between:1,10',
            'salary_to' => 'required|numeric|digits_between:1,10',
            'show_salary' => 'nullable'
        ];
    }

    
    public function categories(){
        return $this->belongsToMany(
            Category::class, "target_job_categories",
            'target_job_id', 'category_id'
         )->withTimestamps();
    }

    public function industries(){
        return $this->belongsToMany(
            Category::class, "target_job_industries",
            'target_job_id', 'industry_id'
         )->withTimestamps();
    }

    public function validate_salary($from, $to)
    {
        if ($to < $from) {
            return false;
        }
        return true;
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }

    public function jobtype()
    {
        return $this->belongsTo('App\JobType',"jobtype_id","id");
    }
}
