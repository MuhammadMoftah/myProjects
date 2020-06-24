<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    protected $table = 'boards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'private', 'user_id',
    ];

    protected $append = ['image'];

    public function scopePrivate($query)
    {
        $query->where('private', 1);
    }

    public function scopePublic($query)
    {
        $query->where('private', 0);
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\SavedItem', 'board_id');
    }

    public function getImageAttribute()
    {
        if (count($this->items)) {
            return $this->items->last()->image;
        }

        return asset('assets/site/images/empty_board.jpg');
    }
}
