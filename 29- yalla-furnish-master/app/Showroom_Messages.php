<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showroom_Messages extends Model
{
 
    protected $table="showroom_messages";

    protected $fillable = [ 'read' ,'reply', 'block']; 
    public function images()
    {
        return $this->hasMany('App\Message_Images','msg_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function showroom()
    {
        return $this->belongsTo('App\Showroom');
    }
}
