<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowroomStyle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'showroom_id', 'style_id'
    ];

    public function addStyleToShowroom($style_id, $showroom_id)
    {
        $this->create([
            'showroom_id' => $showroom_id,
            'style_id' => $style_id,
        ]);
    }

    public function style()
    {
        return $this->belongsTo('App\Style')->withTrashed();
    }

    public function showroom()
    {
        return $this->belongsTo('App\Showroom');
    }
}
