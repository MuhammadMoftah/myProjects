<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = [
        'image', 'project_id'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function setImageAttribute($image)
    {
        if (!$image)
            return;
        $image = $image->store('projects', 's3');
        $this->attributes['image'] = $image;
    }

}
