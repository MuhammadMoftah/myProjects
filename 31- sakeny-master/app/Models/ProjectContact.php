<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectContact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'project_id', 'seen', 'message'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
