<?php

use Illuminate\Support\Facades\Storage;
define('ADMIN_PATH', 'admin');


Route::group(['prefix'=>ADMIN_PATH],function(){

	Route::group(['namespace'=>'Auth\Admin'], function(){
		Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
		// Password Reset Routes...
		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

		Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('password/reset', 'ResetPasswordController@reset');
	});


	Route::group(['middleware'=>['admin.auth', 'admin.permission'],'namespace'=>'Admin'],function(){
		Route::get('/', 'DashboardController@index');
		Route::get('profile','ProfileController@getIndex');
		Route::post('profile','ProfileController@postIndex');

		Route::resource('admin','AdminController');

		Route::resource('role','RoleController');

		Route::resource('user','UserController');
		Route::resource('developer','DeveloperController');
		Route::resource('company','CompanyController');
        Route::get('company/update-view-in-front/{id}','CompanyController@updateViewInFront');

		Route::get('company/approve/{id}','CompanyController@approve');

        Route::get('reports','ReportsController@index');
        Route::delete('reports/{id}', 'ReportsController@destroy');

        Route::resource('project','ProjectController');
        Route::get('project/update-view-in-front/{id}','ProjectController@updateViewInFront');
        Route::get('project/{id}/contact','ProjectController@viewContacts');
		Route::delete('/project/image/delete/{id}', 'ProjectController@destroyImage');
		Route::delete('/project/feature/delete/{id}', 'ProjectController@destroyFeature');
		Route::resource('country','CountryController');
        Route::resource('city','CityController');
        Route::resource('blog','BlogController');
		Route::resource('banner','BannerController');
		Route::resource('life-style-category', 'LifeStyleCategoryController');
		Route::resource('life-style', 'LifeStyleController');
		Route::resource('package', 'PackageController');
		Route::resource('page','PageController');
		Route::resource('ads','AdsController');
        Route::get('ads/update-status/{id}','AdsController@updateStatus');
        Route::get('ads/update-selected/{id}','AdsController@updateSelected');
        Route::get('ads/{id}/update-history','AdsController@updateHistory');
        Route::get('ads/{ad_id}/view/{history_id}','AdsController@viewHistory');
        Route::get('ads/api/users','AdsController@getUsersWithType');
        Route::get('ads/api/cities','AdsController@getCities');
        Route::get('ads/{ad_id}/accept/{history_id}','AdsController@acceptHistory');
		Route::get('ads/{ad_id}/reject/{history_id}','AdsController@rejectHistory');
		Route::delete('/ads/image/delete/{id}', 'AdsController@destroyImage');
        Route::resource('property-type','PropertyTypeController');
        Route::resource('amenities','AmenitiesController');
		Route::resource('level-of-finished','LevelOfFinishedController');
		Route::resource('offer-type','OfferTypeController');
		Route::resource('unit-view','UnitViewController');
		Route::resource('contact-us','ContactUsController');
		Route::post('contact-us/reply/reply','ContactUsController@postReply');
		Route::resource('settings','SettingsController');
		Route::resource('notification','NotificationController');

	});
});

Route::get('test2',function(){
	print Carbon\Carbon::now()->addMonths(1)->format('Y-m-d');
});



Route::get('/active-demo/{email}',function($email){
	print "This page will redirect agent to frontend url to active agent account
	if you get this page please contact with me to change redirection url to your app
	";
	print Carbon\Carbon::now()->addMonths(1)->format('Y-m-d');
});

Route::get('tt', function(){
	$list =  collect(json_decode(request('ads'), true))->toArray();;
	return $list[0];
});

