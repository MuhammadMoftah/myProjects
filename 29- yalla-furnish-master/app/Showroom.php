<?php

namespace App;

use App\ShowroomReview;
use App\Showroom_Follower;
use App\ChatFollow;
use App\ChatBlock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Showroom extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'about', 'yt', 'tw', 'fb', 'instgram', 'website', 'district_id',
        'showroom_image', 'showroom_coverImage', 'user_id', 'active', 'reason', 'approve', 'slug', 'contact_name', 'contact_email',
        'phone'
    ];

    protected $append = ['showroom_rate'];

    public function getWebsiteAttribute($value)
    {
        if (strpos($value, 'https') !== 0 && strpos($value, 'http') !== 0 && $value) {
            return '//' . $value;
        }
        return $value;
    }

    public function getInstgramAttribute($value)
    {
        if (strpos($value, 'https') !== 0 && strpos($value, 'http') !== 0 && $value) {
            return '//' . $value;
        }
        return $value;
    }

    public function getYtAttribute($value)
    {
        if (strpos($value, 'https') !== 0 && strpos($value, 'http') !== 0 && $value) {
            return '//' . $value;
        }
        return $value;
    }

    public function getTwAttribute($value)
    {
        if (strpos($value, 'https') !== 0 && strpos($value, 'http') !== 0 && $value) {
            return '//' . $value;
        }
        return $value;
    }

    public function getFbAttribute($value)
    {
        if (strpos($value, 'https') !== 0 && strpos($value, 'http') !== 0 && $value) {
            return '//' . $value;
        }
        return $value;
    }

    public function pins()
    {
        return $this->morphMany('App\ChatFollow', 'pinnable');
    }
    public function branches()
    {
        return $this->hasMany('App\Branch', 'showroom_id', 'id');
    }
    public function isPinned()
    {
        $pinned = ChatFollow::where([
            'user_id' => CurrentUser()->id,
            'pinnable_id' => $this->id,
            'pinnable_type' => 'App\Showroom',
        ])->first();
        return $pinned;
    }
    public function isBlocked()
    {
        if ($blocked = ChatBlock::where(['user_id' => CurrentUser()->id,  'showroom_id' => $this->id])->first()) {
            return true;
        } else {
            return false;
        }
    }
    public function nonBlocked()
    {
        if ($blocked = ChatBlock::where(['user_id' => CurrentUser()->id,  'showroom_id' => $this->id])->first()) {
            return false;
        } else {
            return true;
        }
    }
    public function products()
    {
        return $this->hasMany('App\Product')->approve()->latest();
    }
    public function updates()
    {
        return $this->hasMany('App\UserUpdate');
    }
    public function Showroom_Messages()
    {
        return $this->hasMany('App\Showroom_Messages');
    }
    public function ReplyMessages()
    {
        return $this->hasMany('App\MessageReply', 'showroom_id', 'id');
    }
    public function followers()
    {
        return $this->belongsToMany('App\User', 'showrooms_followers', 'showroom_id', 'user_id')->withPivot('deleted_at');
    }

    public function showroom_followers()
    {
        return $this->hasMany('App\Showroom_Follower');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function offers()
    {
        return $this->hasMany('App\Product')->approve()->whereHas('offer', function ($query) {
            $query->active();
        })->latest();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'showroom_categories')->withTrashed();
    }

    public function styles()
    {
        return $this->belongsToMany('App\Style', 'showroom_styles')->withTrashed();
    }

    public function district()
    {
        return $this->belongsTo('App\Districtes')->withTrashed();
    }

    public function check_following($showroom_id, $user_id)
    {
        if ($this->user_id == $user_id) {
            return false;
        }

        $follow = Showroom_Follower::where('user_id', $user_id)->where('showroom_id', $showroom_id)->first();
        if ($follow) {
            return true;
        } else {
            return false;
        }
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function scopeApprove($query)
    {
        $query->where('approve', 1);
    }

    public function getShowroomImageAttribute($value)
    {
        // return asset('storage/showrooms_image/' . $value);
        return env('AWS_URL') . 'showrooms_image/' . $value;
    }

    public function getShowroomCoverImageAttribute($value)
    {
        // return asset('storage/showrooms_image/' . $value);
        return env('AWS_URL') . 'showrooms_image/' . $value;
    }

    public function setShowroomImageAttribute()
    {
        if (request()->hasFile('showroom_image')) {
            $image_name = time() . uniqid() . '.' . request('showroom_image')->getClientOriginalExtension();
            if (!Storage::disk('s3')->put('showrooms_image/' . $image_name, File::get(request('showroom_image'), 'public'))) {
                throw new \Exception('error in uploading image');
            }

            $this->attributes['showroom_image'] = $image_name;
        }
    }

    public function setShowroomCoverImageAttribute()
    {
        if (request()->hasFile('background_image')) {
            $image_name = time() . uniqid() . '.' . request('background_image')->getClientOriginalExtension();
            if (!Storage::disk('s3')->put('showrooms_image/' . $image_name, File::get(request('background_image')), 'public')) {
                throw new \Exception('error in uploading image');
            }

            $this->attributes['showroom_coverImage'] = $image_name;
        }
    }

    public function user_review($user_id)
    {
        $showroom_reviews = ShowroomReview::where('user_id', $user_id)
            ->where('showroom_id', $this->id)
            ->count();
        if ($showroom_reviews > 0) {
            return true;
        } else {
            return false;
        }
    }

    public  function userReview($user_id)
    {
        return ShowroomReview::where('user_id', $user_id)
            ->where('showroom_id', $this->id)->first();
    }

    public function reviews()
    {
        return $this->hasMany('App\ShowroomReview');
    }

    public function getShowroomRateAttribute()
    {
        $showroom_reviews = $this->reviews;
        $count = count($showroom_reviews);
        $sum = 0;
        for ($i = 0; $i < $count; $i++) {
            $sum += $showroom_reviews[$i]->rate;
        }
        $avg = 0;
        if ($count != 0) {
            $avg = $sum / $count;
        }

        return $avg;
    }
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($showroom) {
            $showroom->updates()->delete();
            $showroom->branches()->delete();
            $showroom->showroom_followers()->delete();
        });
    }

    public function malls()
    {
        return $this->belongsToMany('App\Mall', 'mall_showrooms');
    }
}
