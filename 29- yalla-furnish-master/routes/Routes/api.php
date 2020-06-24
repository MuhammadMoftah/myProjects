<?php
Route::group(['as' => 'api.products.'], function () {
    Route::get('/homeProducts', ['as' => 'home', 'uses' => 'ProductController@getHomeProducts']);
    Route::get('/product/{id}', ['as' => 'single', 'uses' => 'ProductController@getSingleProduct']);
    Route::get('/products', ['as' => 'get', 'uses' => 'ProductController@getProducts']);
    Route::get('/products/showroom/{id}', ['as' => 'get', 'uses' => 'ProductController@getShowroomproducts']);
});

Route::group(['as' => 'api.users.'], function () {
    Route::post('/login', ['as' => 'login', 'uses' => 'UserAuthConrtoller@login']);
    Route::post('/register', ['as' => 'register', 'uses' => 'UserAuthConrtoller@register']);
    Route::get('/user/{id}', ['as' => 'single', 'uses' => 'UserController@getUserprofile']);
});

Route::group(['as' => 'api.activities.'], function () {
    Route::get('/activities/{id}', ['as' => 'get', 'uses' => 'ActivityController@getUserActivities']);
});

Route::group(['as' => 'api.styles.'], function () {
    Route::get('/styles', ['as' => 'get', 'uses' => 'StyleController@getStyles']);
});

Route::group(['as' => 'api.countries.'], function () {
    Route::get('/countries', ['as' => 'get', 'uses' => 'CountryConrtoller@getCountries']);
});

Route::group(['as' => 'api.cities.'], function () {
    Route::get('/cities', ['as' => 'get', 'uses' => 'CityController@getCities']);
});

Route::group(['as' => 'api.districts.'], function () {
    Route::get('/districts', ['as' => 'get', 'uses' => 'DistrictController@getDistricts']);
});

Route::group(['as' => 'api.location.'], function () {
    Route::get('/locations', ['as' => 'get', 'uses' => 'CityController@getLocations']);
});

Route::group(['as' => 'api.categories.'], function () {
    Route::get('/categories', ['as' => 'get', 'uses' => 'CategoryConrtoller@getCategories']);
});

Route::group(['as' => 'api.showrooms.'], function () {
    Route::get('/showrooms', ['as' => 'get', 'uses' => 'ShowroomController@getShowrooms']);
    Route::get('/showroom/{id}', ['as' => 'single', 'uses' => 'ShowroomController@getSingleShowroom']);
    Route::get('/showroom/info/{id}', ['as' => 'info', 'uses' => 'ShowroomController@getShowroominfo']);
    Route::get('/showroom/reviews/{id}', ['as' => 'info', 'uses' => 'ShowroomReviewController@getShowroomReviews']);
});

Route::group(['as' => 'api.ideas.'], function () {
    Route::get('/ideas', ['as' => 'get', 'uses' => 'IdeaController@getIdeas']);
    Route::get('/ideas/user/{id}', ['as' => 'user.get', 'uses' => 'IdeaController@getUserIdeas']);
});

Route::group(['as' => 'api.boards.'], function () {
    Route::get('/boards/user/{id}', ['as' => 'user.get', 'uses' => 'BoardController@getUserBoards']);
});

Route::group(['as' => 'api.topics.'], function () {
    Route::get('/topics', ['as' => 'get', 'uses' => 'TopicController@getTopics']);
    Route::get('/topics/user/{id}', ['as' => 'user.get', 'uses' => 'TopicController@getUserTopics']);
});

Route::group(['as' => 'api.offers.'], function () {
    Route::get('/offers', ['as' => 'get', 'uses' => 'OfferController@getOffers']);
    Route::get('/offer/{id}', ['as' => 'single', 'uses' => 'OfferController@getSingleOffer']);
    Route::get('/offers/showroom/{id}', ['as' => 'get', 'uses' => 'OfferController@getShowroomOffers']);
});

// authenticated routes
Route::group(['middleware' => 'user_api_auth'], function () {
    Route::group(['as' => 'api.products.', 'prefix' => 'products'], function () {
        Route::post('/like', ['as' => 'like', 'uses' => 'LikeController@likeProduct']);
        Route::post('/addToCompare', ['as' => 'compare', 'uses' => 'ProductCompareController@compareProduct']);
        Route::get('/compareList', ['as' => 'compare.list', 'uses' => 'ProductCompareController@getCompareList']);
    });

    Route::group(['as' => 'api.ideas.', 'prefix' => 'ideas'], function () {
        Route::post('/like', ['as' => 'like', 'uses' => 'LikeController@likeIdea']);
    });

    Route::group(['as' => 'api.topics.', 'prefix' => 'topics'], function () {
        Route::post('/like', ['as' => 'like', 'uses' => 'LikeController@likeTopic']);
    });

    Route::group(['as' => 'api.showrooms.', 'prefix' => 'showrooms'], function () {
        Route::post('/follow', ['as' => 'follow', 'uses' => 'ShowroomFollowerController@followShowroom']);
        Route::post('/store/review', ['as' => 'review.store', 'uses' => 'ShowroomReviewController@storeReview']);
    });

    Route::group(['as' => 'api.users.', 'prefix' => 'users'], function () {
        Route::post('/follow', ['as' => 'follow', 'uses' => 'FollowUserController@followUser']);
    });
});
