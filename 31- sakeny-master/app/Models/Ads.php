<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat\ChatRooms;
use Session;
// use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;


class Ads extends Model
{


    protected $fillable = [
        'title', 'offer_type_id', 'latitude', 'longitude', 'size', 'property_type_id', 'price',
        'price_negotiable', 'bedrooms_num', 'bathrooms_num', 'finishing_level',
        'unit_view_id', 'building_year', 'description', 'agent_id', 'owner_id',
        'country_id', 'city_id', 'status', 'expire_date', 'is_premium', 'is_bump_up', 'search', 'featured',
        'able_call', 'able_email', 'able_chat', 'level_of_finished_id', 'amenitie_id', 'is_selected', 'user_active', 'district_id', 
        'repeated'];

    protected $with = ['owner', 'country', 'city', 'images', 'property_type', 'offer_type', 'unit_view', 'agent', 'level_of_finished'];

    protected $appends = [
        'is_fav', 'amenities'
    ];

    //auto calling
    public static function boot()
    {
        static::bootTraits();
        static::created(function ($model) {
            $date = Carbon::now()->addMonths(6)->format('Y-m-d');
            $activity = $model->update(['expire_date' => $date]);
        });
    }



    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function level_of_finished()
    {
        return $this->belongsTo(LevelOfFinished::class, 'level_of_finished_id');
    }

    public function images()
    {
        return $this->hasMany(AdsImage::class, 'ads_id', 'id');
    }

    public function reports()
    {
        return $this->hasMany(Reports::class, 'ad_id', 'id');
    }

    public function getAmenitieAttribute()
    {
        return $this->amenitie_id;
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function offer_type()
    {
        return $this->belongsTo(OfferType::class);
    }

    public function unit_view()
    {
        return $this->belongsTo(UnitView::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    //is_premium
    public function setIsPremiumAttribute($is_premium)
    {
        $this->attributes['is_premium'] = $is_premium ? Carbon::now() : null;
    }
    //amenitie_id
    public function setAmenitieIdAttribute($types)
    {
        if (is_array($types)) {
            $types = json_encode($types);
        }

        if (!is_array(json_decode($types))) {
            $this->attributes['amenitie_id'] = collect($types)->toJson();
        } else {
            $this->attributes['amenitie_id'] = $types;
        }
    }

    public function getAmenitieIdAttribute($types)
    {
        return json_decode($types, true) ? json_decode($types, true) : [];
    }


    //amenites
    public function getAmenitiesAttribute()
    {

        return is_array($this->amenitie_id) ?
            Amenities::whereIn('id', $this->amenitie_id)->get() : (is_integer($this->amenitie_id) ? Amenities::where('id', $this->amenitie_id)->get() : []);
    }

    public function scopeExpired($query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $query->whereDate('expire_date', '<=', $date);
    }

    public function scopeValid($query)
    {
        $date = Carbon::now()->format('Y-m-d');
        $query->whereDate('expire_date', '>=', $date);
    }

    public function scopeActive($query)
    {
        $query->where('status', 1)->where('user_active', 1);
    }

    public function scopeDeactive($query)
    {
        $query->where('status', 0);
    }
    
    public function scopeRepeated($query)
    {
        $query->where('repeated', 1);
    }



    public function scopeBusinessOrder($query)
    {
        // $query->latest('is_premium')->latest('is_bump_up')
        //     ->whereHas('owner', function ($query) {
        //         $query->latest('type');
        //     })->orderBy('featured', 'created_at');
        $query->whereHas('owner', function ($query) {
            $query;
        })->latest('featured')->latest();
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function scopeNotFeatured($query)
    {
        return $query->where('featured', 0);
    }

    // public function scopeBumpUpOrder($query)
    // {
    //     $query->latest('is_bump_up')
    //         ->whereHas('owner', function($query){
    //             $query->latest('type');
    //         })->latest();
    // }


    public function renewAd($days = 15)
    {
        $date = Carbon::now()->addDays($days)->format('Y-m-d');
        $activity = $this->update(['expire_date' => $date]);
    }

    public function updateAdToBumpUp()
    {
        $date = Carbon::now();
        $activity = $this->update(['is_bump_up' => $date]);
    }

    public function updateAdToPremuim()
    {
        $date = Carbon::now();
        $activity = $this->update(['is_premium' => $date]);
    }




    public static function getPropertyTypeList()
    {
        return [
            0 => trans('lang.apartment'),
            1 => trans('lang.duplex'),
            2 => trans('lang.chalet'),
            3 => trans('lang.Villa'),
        ];
    }

    public static function getUnitViewList()
    {
        return [
            0 => trans('lang.Garden'),
            1 => trans('lang.Main street'),
            2 => trans('lang.Side street'),
        ];
    }


    public function scopeTimeArrange($query, $time = 'week')
    {
        if ($time == 'today') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($time == 'month') {
            $query->whereDate('created_at', '>=', Carbon::now()->subMonth());
        } elseif ($time == 'week') {
            $query->whereDate('created_at', '>=', Carbon::now()->subWeek());
        }
    }


    public function getIsFavAttribute()
    {
        if ($auth = auth()->guard('api')->user()) {
            return (bool) AdFavourite::where(['user_id' => $auth->id, 'ad_id' => $this->id])->count();
        }
        return false;
    }


    public function chatRooms()
    {
        return $this->hasMany(ChatRooms::class, 'ad_id', 'id');
    }

    public function getShareLink($provider)
    {
        $link = route('user.ad.get', ['id' => $this->id, 'lang' => app()->getLocale(), 'ad_name' => str_replace('+', '-', urlencode(str_replace('/', '', str_replace('%', '', $this->title))))]);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . str_replace('+', '-', urlencode(str_replace('/', '', $this->title)));
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . str_replace('+', '-', urlencode(str_replace('/', '', $this->title)));
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }


    public static function getPopularAds()
    {
        $country_id = Session::get('country_id');
        $ads = Ads::orderBy('search', 'ASEC')->active()->BusinessOrder()->Valid()
            ->whereHas('owner', function ($query) {
                $query->where('activation', 1);
            })->where('country_id', $country_id)->take(6)->get();

        return $ads;
    }


    public function isFavourite()
    {
        if (!auth()->guard('user')->check()) {
            return false;
        }

        $user = auth()->guard('user')->user();

        $favourite = AdFavourite::where([
            'user_id' => $user->id,
            'ad_id' => $this->id
        ])->first();

        return $favourite ? true : false;
    }

    public function checkIfInCompare()
    {
        if (!auth()->guard('user')->check()) {
            return false;
        }

        $user = auth()->guard('user')->user();

        $comparelist = CompareAds::where('user_id', $user->id)->first();

        if (!$comparelist) {
            return false;
        }

        $ads_ids = json_decode($comparelist->ads_ids);

        if (count($ads_ids) == 2) {
            return true;
        }

        return in_array($this->id, $ads_ids) ? true : false;
    }

    public function checkIfFeaturedCompeleted($id = null)
    {
        $featured_ads_count = $this->newQuery();

        if ($id) {
            $featured_ads_count->where('id', '!=', $id);
        }

        $featured_ads_count = $featured_ads_count->featured()->count();

        return $featured_ads_count == 21 ? false : true;
    }
}
