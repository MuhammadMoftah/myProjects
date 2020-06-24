<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Project extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'address', 'description_ar', 'description_en', 'developer_description_ar',
        'developer_description_en', 'location', 'video', 'developer_id', 'longitude', 'latitude',
        'country_id', 'city_id', 'activation', 'email', 'phone_number', 'view_in_front', 'size_from', 'size_to',
        'price_from', 'price_to', 'property_type_id', 'feature', 'district_id'
    ];
    protected $with = ['images', 'country', 'features', 'city', 'developer', 'district'];
    // protected $appends = ['thumbnail', 'properties'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    //amenitie_id
    public function setPropertyTypeIdAttribute($types)
    {
        $this->attributes['property_type_id'] = collect($types)->toJson();
    }

    public function getPropertyTypeIdAttribute($types)
    {
        return json_decode($types, true) ? json_decode($types, true) : [];
    }


    //amenites
    public function getPropertiesAttribute()
    {

        return is_array($this->property_type_id) ?
            PropertyType::whereIn('id', $this->property_type_id)->get() : (is_integer($this->property_type_id) ? PropertyType::where('id', $this->property_type_id)->get() : []);
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

//        $video_name = 'uploads/projects/videos/' . time() . uniqid() . '.' . $video->getClientOriginalExtension();
        $video_name = 'uploads/projects/' . time() . uniqid() . '.' . $video->getClientOriginalExtension();

        if (!Storage::disk('s3')->put($video_name, File::get($video), 'public')) {
            throw new \Exception('error in uploading video');
        }

        $this->attributes['video'] = $video_name;
//        return $video_name;
    }

    public function scopeActive($query)
    {
        $query->where('activation', 1);
    }

    public function contacts()
    {
        return $this->hasMany(ProjectContact::class, 'project_id', 'id');
    }

    public function getShareLink($provider)
    {
        $link = route('user.project.get', ['id' => $this->id, 'lang' => app()->getLocale(), 'project_title' => str_replace('+', '-', urlencode(str_replace('/', '', str_replace('%', '', $this->title_en))))]);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . str_replace('+', '-', urlencode(str_replace('/', '', str_replace('%', '', $this->title_en))));
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . str_replace('+', '-', urlencode(str_replace('/', '', str_replace('%', '', $this->title_en))));
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }
}
