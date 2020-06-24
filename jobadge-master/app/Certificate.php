<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\HandleDateDisplay;

class Certificate extends Model
{

    // trait to get function display format date
    use HandleDateDisplay;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'place_name', 'member_id', 'user_id', 'date', 'expired_date',
    ];

    

    public function getCreateAndUpdateRules()
    {
        return [
            'name' => 'required|max:200',
            'place_name' => 'required|max:200',
            'member_id' => 'sometimes|max:25',
            'date' => 'sometimes|date_format:l d F Y|before_or_equal:today',
            'expired_date' => 'nullable|date_format:l d F Y|after:date'
        ];
       
    }



    

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y');
    }

    public function getExpiredDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('l d F Y') : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->toDateTimeString();
    }

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = $value ? Carbon::parse($value)->toDateTimeString() : $value;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
