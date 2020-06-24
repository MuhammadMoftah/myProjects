<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'type',
    ];

    public function getImageAttribute($value)
    {
        // return asset('storage/backgrounds/' . $value);
        return env('AWS_URL') . 'backgrounds/' . $value;
    }

    public function getUserBackground($background)
    {
        if (request('type') == 'user') {
            // return asset('storage/users_backgrounds/' . $background);
            return env('AWS_URL') . 'users_backgrounds/' . $background;
        } else {
            // return asset('storage/backgrounds/' . $background);
            return env('AWS_URL') . 'backgrounds/' . $background;
        }
    }
}
