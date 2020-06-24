<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Offer;
use App\Traits\CacheKeyTrait;
use Carbon\Carbon;
use App\UserUpdate;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendNotification;

class OfferService
{
    private $offer_model;

    public function __construct()
    {
        $this->offer_model = new Offer();
        $this->request = new Request;
    }

    public function getOffersByShowroom($showroom_id)
    {
        $offers = $this->offer_model->active()->whereHas('product', function ($query) use ($showroom_id) {
            $query->whereHas('showroom', function ($query) use ($showroom_id) {
                $query->where('id', $showroom_id);
            });
        })->with('product.images')->get();

        return $offers;
    }

    public function storeOffer($product_id, $showroom_id)
    {
        $offer = $this->offer_model->create([
            'product_id' => $product_id,
            'expire_date' => request('valid_date'),
            'discount' => request('discount'),
            'start_date' => Carbon::now()->format('m/d/Y'),
        ]);
        UserUpdate::create([
            'showroom_id' => $showroom_id,
            'offer_id' => $product_id,
        ]);
        $product = $offer->product;
        $showroom = $product->showroom;

        if (request()->route()->getName() == "user.product.update") {
            // send for follower
            Notification::send($showroom->followers, new SendNotification([
                'type' => \App\Product::class,
                'typeId' => $product->id,
                'url' => route('user.offer.get', $product->id),
                'text' => "{$showroom->name_en} add Offer : $product->name_en",
            ]));
        }
    }

    public function updateOffer($product_id)
    {
        $this->offer_model->where('product_id', $product_id)->update([
            'expire_date' => request('valid_date'),
            'discount' => request('discount'),
        ]);
    }

    public function getOffers($paginate = 40, $sortBy = null)
    {
        return cache()->remember(CacheKeyTrait::getOffersKey($paginate, $sortBy), env('SHORT_TIME_CACHE'), function () use ($paginate, $sortBy) {

            $offers = $this->offer_model->newQuery();
            // filter by keyword
            if (request('keyword')) {
                $keyword = request('keyword');

                $offers->whereHas('product', function ($query) use ($keyword) {
                    $arr = explode(" ", $keyword);
                    for ($i = 0; $i < count($arr); $i++) {
                        $query->where(function ($query) use ($arr, $i) {
                            $query->where(function ($query) use ($arr, $i) {
                                $query->where('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_en', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhere(function ($query) use ($arr, $i) {
                                $query->where('description_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('description_ar', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhereHas('offer', function ($query) use ($arr, $i) {
                                $query->where('discount', $arr[$i]);
                            })->orWhereHas('categories', function ($query) use ($arr, $i) {
                                $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhereHas('showroom', function ($query) use ($arr, $i) {
                                $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhereHas('style', function ($query) use ($arr, $i) {
                                $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                    ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                            })->orWhereHas('showroom', function ($query) use ($arr, $i) {
                                $query->whereHas('branches', function ($query) use ($arr, $i) {
                                    $query->where('address_en', 'LIKE', '%' . $arr[$i] . '%')
                                        ->orWhere('address_ar', 'LIKE', '%' . $arr[$i] . '%');
                                })->orWhereHas('district', function ($query) use ($arr, $i) {
                                    $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                        ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%')
                                        ->orWhereHas('city', function ($query) use ($arr, $i) {
                                            $query->where('name_en', 'LIKE', '%' . $arr[$i] . '%')
                                                ->orWhere('name_ar', 'LIKE', '%' . $arr[$i] . '%');
                                        });
                                });
                            });
                        });
                    }
                });
            }

            // filter by category
            if (request('category')) {
                $category_id = request('category');
                $offers->whereHas('product', function ($query) use ($category_id) {
                    $query->whereHas('categories', function ($query) use ($category_id) {
                        $query->where('category_id', $category_id);
                    });
                });
            }

            // filter by style
            if (request('style')) {
                $style_id = request('style');
                $offers->whereHas('product', function ($query) use ($style_id) {
                    $query->where('style_id', $style_id);
                });
            }

            // filter by district
            if (request('district')) {
                $district_id = request('district');
                $offers->whereHas('product', function ($query) use ($district_id) {
                    $query->whereHas('branches', function ($query) use ($district_id) {
                        $query->whereHas('district', function ($query) use ($district_id) {
                            $query->where('district_id', $district_id);
                        });
                    });
                });
            }

            // filter by city
            if (request('city')) {
                $city_id = request('city');
                $offers->whereHas('product', function ($query) use ($city_id) {
                    $query->whereHas('branches', function ($query) use ($city_id) {
                        $query->whereHas('city', function ($query) use ($city_id) {
                            $query->where('city_id', $city_id);
                        });
                    });
                });
            }

            if (request('discount')) {
                $offers->where('discount', request('discount'));
            }

            $offers->active()->whereHas('product', function ($query) {
                $query->approve();
            });

            if ($sortBy) {
                $offers->orderBy($sortBy, 'desc');
            }

            return $offers->with('product.images')->paginate($paginate);
        });
    }
}
