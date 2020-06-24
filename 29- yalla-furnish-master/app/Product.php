<?php

namespace App;

use App\ProductCategory;
use App\ProductReview;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'description_en', 'description_ar', 'price', 'height', 'width', 'depth', 'color_id',
        'material_id', 'style_id', 'guarantee', 'others', 'showroom_id', 'approve', 'hidden_price', 'country_id', 'upholstery_id', 'reason',
    ];

    protected $append = ['rate'];

    public function scopeApprove($query)
    {
        $query->where('approve', 1);
    }

    public function scopePNG($query)
    {
        $query->whereHas('images', function ($query) {
            $query->where('image', 'LIKE', '%.png');
        });
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_categories')->withTrashed();
    }


    // have Previous Product
    public static function isPreviosuProduct()
    {

        return  app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() == "user.product.get";
    }
    public function branches()
    {
        return $this->belongsToMany('App\Branch', 'product_branches');
    }


    public function feedBackPrevious()
    {
        return $this->hasMany("App\ProductFeedBack", "product_back_id", "id");
    }

    public function ownerBackPrevious()
    {
        return $this->hasMany("App\ProductFeedBack", "product_id", "id");
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function showroom()
    {
        return $this->belongsTo('App\Showroom')->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo('App\Country')->withTrashed();
    }

    public function upholstery()
    {
        return $this->belongsTo('App\Upholstery')->withTrashed();
    }

    public function style()
    {
        return $this->belongsTo('App\Style')->withTrashed();
    }

    public function material()
    {
        return $this->belongsTo('App\Material')->withTrashed();
    }

    public function color()
    {
        return $this->belongsTo('App\Color')->withTrashed();
    }

    public function comments()
    {
        return $this->hasMany('App\ProductComment')->latest();
    }

    public function saves()
    {
        return $this->hasMany('App\SavedItem');
    }

    public function shares()
    {
        return $this->hasMany('App\Share', 'item_id')->where('type', 'product');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'item_id')->where('type', 'product');
    }

    public function updates()
    {
        return $this->hasMany('App\UserUpdate');
    }

    public function userLike()
    {
        $user_id = auth()->guard('user')->user()->id;
        return $this->hasOne('App\Like', 'item_id')->where([
            'user_id' => $user_id,
            'type' => 'product',
        ]);
    }

    public function offer()
    {
        $now = Carbon::now()->toDateTimeString();

        return $this->hasOne('App\Offer')->where('start_date', '<=', $now)->where('expire_date', '>', $now);
    }

    public function reviews()
    {
        return $this->hasMany('App\ProductReview');
    }

    public function getRateAttribute()
    {
        $reviews = $this->reviews;
        $count = count($reviews);
        $sum = 0;
        foreach ($reviews as $review) {
            $sum += $review->rate;
        }

        $avg = 0;
        if ($count != 0) {
            $avg = $sum / $count;
        }

        return $avg;
    }

    public function getRelatedProducts()
    {
        $categories_ids = $this->categories->pluck('id');

        $product_categories_model = new ProductCategory;

        if (request()->route()->getName() == 'user.offer.get') {
            // get latest offers from same category
            $products_ids = $product_categories_model->whereIn('category_id', $categories_ids)->where('product_id', '!=', $this->id)->whereHas('product', function ($query) {
                $query->approve()->whereHas('offer', function ($query) {
                    $query->active();
                });
            })->distinct()->take(8)->pluck('product_id')->toArray();
        } else {
            // get latest products from same category and showroom
            $products_ids = $product_categories_model->whereIn('category_id', $categories_ids)->where('product_id', '!=', $this->id)->whereHas('product', function ($query) {
                $query->approve()->where('showroom_id', $this->showroom_id);
            })->distinct()->take(8)->pluck('product_id')->toArray();

            $products_ids_count = count($products_ids);

            $remain_numbers = 8 - $products_ids_count;

            if ($remain_numbers) {
                $remain_ids = $this->whereHas('categories', function ($query) use ($categories_ids) {
                    $query->whereIn('category_id', $categories_ids);
                })->where('showroom_id', '!=', $this->showroom_id)->distinct()->take($remain_numbers)->pluck('id')->toArray();

                $products_ids = array_merge($remain_ids, $products_ids);
            }
        }

        $products = $this->whereIn('id', $products_ids)->latest()->get();

        return $products;
    }

    public function getFeaturedImageAttribute()
    {
        if (count($this->images) !== 0) {
            $image = $this->images[0];
            return $image->image;
        }
    }

    public function hasReview()
    {
        $review = ProductReview::where([
            'user_id' => auth()->guard('user')->user()->id,
            'product_id' => $this->id,
        ])->first();

        return $review ? true : false;
    }

    public function getPriceAttribute($value)
    {
        return $value ?: 'N/A';
    }

    public function getHeightAttribute($value)
    {
        return $value ?: 'N/A';
    }

    public function getWidthAttribute($value)
    {
        return $value ?: 'N/A';
    }

    public function getDepthAttribute($value)
    {
        return $value ?: 'N/A';
    }

    public function getGuaranteeAttribute($value)
    {
        return $value ?: 'N/A';
    }

    public function pngImages()
    {
        return $this->hasMany('App\ProductImage')->where('image', 'LIKE', '%.png');
    }
}
