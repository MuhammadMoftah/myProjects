<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'requirement', 'title', 'category_id'];

    public function getCreateAndUpdateRules()
    {
        return [
            'description' => 'required|max:10000',
            'requirement' => 'required|max:10000',
            'title' => 'required|max:200',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
