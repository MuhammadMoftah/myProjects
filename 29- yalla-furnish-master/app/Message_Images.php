<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_Images extends Model
{
    protected $table = 'message_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'msg_id',
    ];

    public function getImageAttribute($value)
    {
        return env('AWS_URL') . 'messages/' . $value;
    }
}
