<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skill', 'user_id'
    ];

    public function create_rules()
    {
        return [
            'skills' => 'nullable',
        ];
    }
}
