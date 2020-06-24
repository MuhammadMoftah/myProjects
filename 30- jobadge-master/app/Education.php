<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\HandleDateDisplay;

class Education extends Model
{

    // trait to get function display format date
    use HandleDateDisplay;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'degree', 'place_name', 'major', 'country_id', 'user_id', 'city_id', 'from_year',
         'to_year', 'notes',"faculty"
    ];

    public $table = "educations";
    // protected $dates = [
    //     'from_year','to_year'
    // ];
    public function getCreateAndUpdateRules()
    {
        return [
            'degree' => ['required', 'max:200' ],
            'place_name' => 'required|max:200',
            'major' => ['required', 'max:200'],
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'from_year' => 'required|date_format:l d F Y|before:today',
            'to_year' => 'required|date_format:l d F Y|after:from_year',
            "faculty"=>['required', "string",'max:254' ]
        ];
    }

    public function setToYearAttribute($value)
    {
        // $this->attributes['to_year'] = Carbon::parse($value)->toDateTimeString($value);
        $this->attributes['to_year'] = $value ? Carbon::parse($value)->toDateTimeString() : null;

    }

    public function setFromYearAttribute($value)
    {
        // $this->attributes['from_year'] = Carbon::parse($value)->toDateTimeString($value);
        $this->attributes['from_year'] = $value ? Carbon::parse($value)->toDateTimeString() : null;
    }

    public function getToYearAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y');
    }

    public function getFromYearAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y');
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
}
