<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'message', 'subject'
    ];

    public function images()
    {
        return $this->hasMany('App\ConsultantImage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getSubjectAttribute($value)
    {
        return $value ?: 'No Subject';
    }
}
