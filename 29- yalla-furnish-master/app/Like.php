<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['item_id', 'user_id', 'type'];

    public function user()  {  return $this->belongsTo('App\User');   } 
    public function product() { return $this->belongsTo('App\Product', 'item_id');  } 
    public function topic() {  return $this->belongsTo('App\Topic', 'item_id'); } 
    public function idea() { return $this->belongsTo('App\Idea', 'item_id'); } 
    public function showroomReview() { return $this->belongsTo('App\ShowroomReview', 'item_id');  }
    public function comment()  { return $this->belongsTo('App\Comment', 'item_id'); }
    public function reply()  { return $this->belongsTo('App\Reply', 'item_id'); } 
}
