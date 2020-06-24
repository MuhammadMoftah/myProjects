<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectContact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'project_id', 'seen'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
