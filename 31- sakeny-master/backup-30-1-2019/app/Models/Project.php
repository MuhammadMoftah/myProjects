<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'address', 'description_ar', 'description_en', 'developer_description_ar',
        'developer_description_en', 'location', 'video', 'developer_id', 'longitude', 'latitude',
        'country_id', 'city_id', 'activation', 'email', 'phone_number' , 'view_in_front'
    ];
    protected $with = ['images','country','features','city','developer'];
    protected $appends = ['thumbnail'];

    public function images()
    {
    	return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function features()
    {
        return $this->hasMany(ProjectFeature::class, 'project_id', 'id');
    }

    public function developer()
    {
    	return $this->belongsTo(Developer::class);
    }
    //Thumbnail
    public function getThumbnailAttribute()
    {
        return @$this->images()->first()->image;
    }

    public function setVideoAttribute($video)
    {
        if (!$video)
            return;
        $video = $video->store('projects', 's3');
        $this->attributes['video'] = $video;
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function contacts()
    {
        return $this->hasMany(ProjectContact::class, 'project_id', 'id');
    }

}
