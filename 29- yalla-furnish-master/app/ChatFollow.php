<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatFollow extends Model
{
    protected $fillable = ['pinnable_id', 'pinnable_type', 'user_id']; 
    protected $hidden = ['updated_at']; // hidden column 

    public function pinnable() { return $this->morphTo(); } 
    public function user() { return $this->belongsTo('App\User');  }
}
