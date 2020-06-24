<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchInfo extends Model
{
    protected $table = 'branches_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'from', 'to', 'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
