<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatBlock extends Model
{
    protected $fillable = ['user_id', 'showroom_id']; 
    protected $hidden = ['updated_at']; // hidden column  
    public function user() { return $this->belongsTo('App\User');  }
    public function showroom() { return $this->belongsTo('App\Showroom');  }
}
