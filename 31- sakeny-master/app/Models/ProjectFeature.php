<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFeature extends Model
{
    protected $fillable = [
        'feature', 'project_id'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

}