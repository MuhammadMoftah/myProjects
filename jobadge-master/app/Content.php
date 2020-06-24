<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body_en', 'body_ar', 'type'
    ];

    public function getUpdateRules()
    {
        return [
            'body_en' => 'required|max:15777215',
            'body_ar' => 'required|max:15777215'
        ];
    }
}
