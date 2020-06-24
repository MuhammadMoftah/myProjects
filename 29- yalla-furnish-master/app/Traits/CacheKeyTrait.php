<?php

namespace App\Traits;

trait CacheKeyTrait
{
    public static function getProductsKey($perPage)
    {
        $page = request('page') ?: 1;
        $cacheKey = 'products';

        if (request('keyword')) {
            $keyword = request('keyword');
            $cacheKey = $cacheKey . ".keyword.$keyword";
        }

        if (request('categorySlug')) {
            $categorySlug = request('categorySlug');
            $cacheKey = $cacheKey . ".categorySlug.$categorySlug";
        }

        if (request('category')) {
            $category_id = request('category');
            $cacheKey = $cacheKey . ".category_id.$category_id";
        }

        if (request('style')) {
            $style_id = request('style');
            $cacheKey = $cacheKey . ".style_id.$style_id";
        }

        if (request('price')) {
            $price = request('price');
            $cacheKey = $cacheKey . ".price.$price";
        }

        if (request('color')) {
            $color = request('color');
            $cacheKey = $cacheKey . ".color.$color";
        }

        if (request('width')) {
            $width = request('width');
            $cacheKey = $cacheKey . ".width.$width";
        }

        if (request('height')) {
            $height = request('height');
            $cacheKey = $cacheKey . ".height.$height";
        }

        if (request('depth')) {
            $depth = request('depth');
            $cacheKey = $cacheKey . ".depth.$depth";
        }

        if (request('city')) {
            $city_id = request('city');
            $cacheKey = $cacheKey . ".city_id.$city_id";
        }

        if (request('district')) {
            $district_id = request('district');
            $cacheKey = $cacheKey . ".district_id.$district_id";
        }

        $cacheKey = $cacheKey . ".perPage.$perPage.page.$page";
        return $cacheKey;
    }

    public static function getIdeasKey($perPage)
    {
        $page = request('page') ?: 1;
        $cacheKey = 'ideas';

        if (isset(request()->keyword)) {
            $keyword = request('keyword');
            $cacheKey = $cacheKey . ".keyword.$keyword";
        }

        if (isset(request()->category)) {
            $category_id = request('category');
            $cacheKey = $cacheKey . "category.$category_id";
            $keyword = request()->value;
        }

        $cacheKey = $cacheKey . ".perPage.$perPage.page.$page";
        return $cacheKey;
    }

    public static function getTopicsKey($perPage)
    {
        $page = request('page') ?: 1;
        $cacheKey = 'topics';

        if (request('keyword')) {
            $keyword = request('keyword');
            $cacheKey = $cacheKey . ".keyword.$keyword";
        }

        if (request('category_id')) {
            $category_id = request('category_id');
            $cacheKey = $cacheKey . "category_id.$category_id";
        }

        if (request('by_following')) {
            $by_following = request('by_following');
            $cacheKey = $cacheKey . "by_following.$by_following";
        }

        $cacheKey = $cacheKey . ".perPage.$perPage.page.$page";
        return $cacheKey;
    }

    public static function getShowroomsKey($perPage)
    {
        $page = request('page') ?: 1;
        $cacheKey = 'showrooms';

        if (isset(request()->keyword)) {
            $keyword = request('keyword');
            $cacheKey = $cacheKey . ".keyword.$keyword";
        }

        if (isset(request()->style)) {
            $style_id = request('style');
            $cacheKey = $cacheKey . "style_id.$style_id";
        }

        if (isset(request()->category)) {
            $category_id = request('category');
            $cacheKey = $cacheKey . "category_id.$category_id";
        }

        if (isset(request()->city)) {
            $city_id = request('city');
            $cacheKey = $cacheKey . "city_id.$city_id";
        }

        if (isset(request()->district)) {
            $district_id = request('district');
            $cacheKey = $cacheKey . "district_id.$district_id";
        }

        $cacheKey = $cacheKey . ".perPage.$perPage.page.$page";
        return $cacheKey;
    }

    public static function getOffersKey($perPage, $sortBy)
    {
        $page = request('page') ?: 1;
        $cacheKey = 'offers';

        if (request('keyword')) {
            $keyword = request('keyword');
            $cacheKey = $cacheKey . ".keyword.$keyword";
        }

        if (request('category')) {
            $category_id = request('category');
            $cacheKey = $cacheKey . ".category.$category_id";
        }

        if (request('style')) {
            $style_id = request('style');
            $cacheKey = $cacheKey . ".style.$style_id";
        }

        if (request('city')) {
            $city_id = request('city');
            $cacheKey = $cacheKey . ".city_id.$city_id";
        }

        if (request('district')) {
            $district_id = request('district');
            $cacheKey = $cacheKey . ".district_id.$district_id";
        }

        if (request('discount')) {
            $discount = request('discount');
            $cacheKey = $cacheKey . ".discount.$discount";
        }

        $cacheKey = $cacheKey . ".perPage.$perPage.page.$page.sortBy.$sortBy";
        return $cacheKey;
    }

    public static function getShowroomListKey($userId)
    {
        return "showrooms.user.$userId";
    }

    public static function getProductsHomeKey($paginate)
    {
        $page = request('page');
        $perPage = $paginate;
        return "home.products.page.$page.per_page.$perPage";
    }

    public static function getOffersHomeKey()
    {
        return "home.offers";
    }
}
