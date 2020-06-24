<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowroomCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'showroom_id', 'category_id'
    ];

    public function addCategoryToShowroom($category_id, $showroom_id)
    {
        $this->create([
            'showroom_id' => $showroom_id,
            'category_id' => $category_id,
        ]);
    }

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }

    public function showroom()
    {
        return $this->belongsTo('App\Showroom');
    }
}
