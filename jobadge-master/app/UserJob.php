<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'job_id', 'view_state', 'qualified_state', 'shortlist_state', 'reject_state', 'reason'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function live_interview()
    {
        return $this->belongsTo('App\LiveInterview', 'id', 'userjob_id');
    }

    public function record_interview()
    {
        return $this->belongsTo('App\RecordInterview', 'id', 'userjob_id');
    }
}
