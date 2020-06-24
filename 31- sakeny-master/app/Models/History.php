<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'ads_ids'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
