<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to', 'from'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'to' => 'required|integer|min:5|max:10000',
            'from' => 'required|integer|min:5|max:10000'
        ];
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
