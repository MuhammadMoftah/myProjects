<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\HandleDateDisplay;

class WorkExperience extends Model
{
    // trait to get function display format date
    use HandleDateDisplay;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'company_name', 'reporting_to', 'industry_id', 'country_id', 'user_id', 'city_id', 'from', 'to', 'job_description',
        'achievements', 'till_present'
    ];

    public function getCreateAndUpdateRules()
    {
        // dd(request()->all());\
        return [
            'company_name' => 'required|max:200',
            'title' => ['required', 'max:200'],
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'industry_id' => 'required|exists:industries,id',
            'description' => 'required|max:4000',
            'from_date' => 'required|date_format:l d F Y|before:today',
        ];
    }

    public function validate_acheivments()
    {
        return [
            'achievements' => 'required|max:4000',
        ];
    }

    public function validateEndDate()
    {
        return [
            'to_date' => 'required|date_format:l d F Y|after:from_date|before:today'
        ];
    }

    public function validate_reporting_to()
    {
        return [
            'reporting_to' => ['required', 'max:200'],
        ];
    }

    public function getToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('l d F Y') : '';
    }

    public function getFromAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y');
    }

    public function setToAttribute($value)
    {
        $this->attributes['to'] = $value ? Carbon::parse($value)->toDateTimeString() : null;
    }

    public function setFromAttribute($value)
    {
        $this->attributes['from'] = Carbon::parse($value)->toDateTimeString();
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

    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }

    public function checkIfUserHasTillNow($user_id)
    {
        $experience = $this->where([
            'till_present' => 1,
            'user_id' => $user_id,
        ])->first();

        return $experience;
    }

    public function TillNowExcept($user_id)
    {
        $experience = $this->where([
            'till_present' => 1,
            'user_id' => $user_id,
        ])->where('id', '!=', $this->id)->first();

        return $experience;
    }

   
}
