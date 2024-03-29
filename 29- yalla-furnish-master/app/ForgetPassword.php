<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
