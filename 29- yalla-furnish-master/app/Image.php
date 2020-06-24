<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Image extends Model
{  
    protected $fillable = ['imageable_id', 'imageable_type', 'user_id', 'path'];
    // Get the owning commentable model. 
    public function imageable()  { return $this->morphTo(); }  

    public function getPathAttribute($value)
    {
        // return env('AWS_URL') . 'comments/' . $value;
        if ($this->type == 'App\Comment') {
             return env('AWS_URL') . 'comments/' . $value;
        }
    }  
}
