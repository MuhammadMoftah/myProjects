<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaCategory extends Model
{
    protected $table = 'idea_categories';
    public $incrementing = true; 

    protected $fillable = [
        'cat_id', 'idea_id', 'created_at', 'updated_at'
    ]; 
    public function idea()
    {
        return $this->belongsTo('App\Idea', 'idea_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id')->withTrashed();
    }
}
