<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
//
    protected $table = 'search_history';
    protected $fillable = [
        'search', 'link', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
