<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id', 'approved'];

    protected $table = 'feedbacks';

    public function getCreateAndUpdateRules()
    {
        return [
            'body' => 'required|max:4000',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
