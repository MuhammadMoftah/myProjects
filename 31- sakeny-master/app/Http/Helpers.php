<?php

use App\Services\SubscriptionService;

function getRequestBetweenPages()
{
    $link = [];

    if (isset(request()->search)) {
        $link['search'] = request()->search;
    }
    if (isset(request()->min_price)) {
        $link['min_price'] = request()->min_price;
    }
    if (isset(request()->max_price)) {
        $link['max_price'] = request()->max_price;
    }
    if (isset(request()->min_bedrooms_num)) {
        $link['min_bedrooms_num'] = request()->min_bedrooms_num;
    }
    if (isset(request()->max_bedrooms_num)) {
        $link['max_bedrooms_num'] = request()->max_bedrooms_num;
    }
    if (isset(request()->min_size)) {
        $link['min_size'] = request()->min_size;
    }
    if (isset(request()->max_size)) {
        $link['max_size'] = request()->max_size;
    }
    if (isset(request()->lat)) {
        $link['lat'] = request()->lat;
    }
    if (isset(request()->lng)) {
        $link['lng'] = request()->lng;
    }

    if (isset(request()->developer_id)) {
        $link['developer_id'] = request()->developer_id;
    }
    if (isset(request()->city_id)) {
        $link['city_id'] = request()->city_id;
    }
    if (isset(request()->district_id)) {
        $link['district_id'] = request()->district_id;
    }
    if (isset(request()->property_type_id)) {
        $link['property_type_id'] = request()->property_type_id;
    }
    if (isset(request()->offer_type_id)) {
        $link['offer_type_id'] = request()->offer_type_id;
    }
    if (isset(request()->featured)) {
        $link['featured'] = request()->featured;
    }
    if (isset(request()->status)) {
        $link['status'] = request()->status;
    }
    return $link;
}

function CanAddAd($subscription, $typeOfAd)
{
    $adType = "";

    // check for special ads
    if ($typeOfAd == 1) {
        return $subscription->no_of_special_ads == 0 ? false : true;
    }

    // check for repeated ads
    if ($typeOfAd == 2) {
        return $subscription->no_of_repeated_ads == 0 ? false : true;
    }

    // check for normal ads
    if ($typeOfAd == 3) {
        return $subscription->no_of_normal_ads == 0 ? false : true;
    }

    // check for seo ads
    if ($typeOfAd == 4) {
        return $subscription->no_of_seo_ads == 0 ? false : true;
    }

    return false;
}

function DecreaseAdsCounter($subscription, $typeOfAd)
{
    $adType = "";

    // check for special ads
    if ($typeOfAd == 1) {
        $subscription->decrement('no_of_special_ads');
    }

    // check for repeated ads
    if ($typeOfAd == 2) {
        $subscription->decrement('no_of_repeated_ads');
    }

    // check for normal ads
    if ($typeOfAd == 3) {
        $subscription->decrement('no_of_normal_ads');
    }

    // check for seo ads
    if ($typeOfAd == 4) {
        $subscription->decrement('no_of_seo_ads');
    }

    return false;
}
