<?php

use Illuminate\Support\Facades\Storage;

if (!defined('ADMIN_PATH')) define('ADMIN_PATH', 'admin');



Route::group(['prefix' => ADMIN_PATH, 'middleware' => 'admin_localization'], function () {

	Route::group(['namespace' => 'Auth\Admin'], function () {
		Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
		// Password Reset Routes...
		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

		Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('password/reset', 'ResetPasswordController@reset');
	});


	Route::group(['middleware' => ['admin.auth', 'admin.permission'], 'namespace' => 'Admin'], function () {
		Route::get('/', 'DashboardController@index');
		Route::get('profile', 'ProfileController@getIndex');
		Route::post('profile', 'ProfileController@postIndex');

		Route::resource('admin', 'AdminController');
		Route::resource('template', 'TemplateController');

		Route::resource('role', 'RoleController');

		Route::resource('user', 'UserController');
		Route::resource('developer', 'DeveloperController');
		Route::resource('company', 'CompanyController');
		Route::get('company/update-view-in-front/{id}', 'CompanyController@updateViewInFront');

		Route::get('company/approve/{id}', 'CompanyController@approve');

		Route::get('reports', 'ReportsController@index');
		Route::delete('reports/{id}', 'ReportsController@destroy');

		Route::resource('project', 'ProjectController');
		Route::get('project/update-view-in-front/{id}', 'ProjectController@updateViewInFront');
		Route::get('project/{id}/contact', 'ProjectController@viewContacts');
		Route::delete('/project/image/delete/{id}', 'ProjectController@destroyImage');
		Route::delete('/project/feature/delete/{id}', 'ProjectController@destroyFeature');
		Route::resource('country', 'CountryController');
		Route::resource('city', 'CityController');
		Route::resource('blog', 'BlogController');
		Route::resource('banner', 'BannerController');
		Route::resource('life-style-category', 'LifeStyleCategoryController');
		Route::resource('life-style', 'LifeStyleController');
		Route::resource('package', 'PackageController');
		Route::resource('page', 'PageController');
		Route::resource('ads', 'AdsController');
		Route::get('ads/update-status/{id}', 'AdsController@updateStatus');
		Route::get('ads/update-selected/{id}', 'AdsController@updateSelected');
		Route::get('ads/{id}/update-history', 'AdsController@updateHistory');

		Route::get('ads/update/featured/{id}', ['as' => 'admin.ads.update_featured', 'uses' => 'AdsController@updateFeatured']);
		Route::get('ads/update/notfeatured/{id}', ['as' => 'admin.ads.update_notfeatured', 'uses' => 'AdsController@updateNotFeatured']);

		Route::get('ads/{ad_id}/view/{history_id}', 'AdsController@viewHistory');
		Route::get('ads/api/users', 'AdsController@getUsersWithType');
		Route::get('ads/api/cities', 'AdsController@getCities');
		Route::get('ads/api/districts', 'AdsController@getDistricts');
		Route::get('ads/{ad_id}/accept/{history_id}', 'AdsController@acceptHistory');
		Route::get('ads/{ad_id}/reject/{history_id}', 'AdsController@rejectHistory');
		Route::delete('/ads/image/delete/{id}', 'AdsController@destroyImage');
		Route::resource('property-type', 'PropertyTypeController');
		Route::resource('amenities', 'AmenitiesController');
		Route::resource('level-of-finished', 'LevelOfFinishedController');
		Route::resource('offer-type', 'OfferTypeController');
		Route::resource('unit-view', 'UnitViewController');
		Route::resource('contact-us', 'ContactUsController');
		Route::post('contact-us/reply/reply', 'ContactUsController@postReply');
		Route::resource('settings', 'SettingsController');
		Route::resource('notification', 'NotificationController');

		Route::get('users/export', ['as' => 'users.export', 'uses' => 'UserController@export']);
		Route::post('users/import', ['as' => 'users.import.post', 'uses' => 'UserController@import']);
		Route::get('companies/export', ['as' => 'companies.export', 'uses' => 'CompanyController@export']);
		Route::get('agents/export/{company_id}', ['as' => 'agents.export', 'uses' => 'CompanyController@exportAgents']);

		Route::get('covers', ['as' => 'admin.covers.all', 'uses' => 'HeaderImageController@getAll']);
		Route::get('covers/view/{id}', ['as' => 'admin.covers.view', 'uses' => 'HeaderImageController@getById']);
		Route::get('covers/create', ['as' => 'admin.covers.create.get', 'uses' => 'HeaderImageController@getCreate']);
		Route::post('covers/create', ['as' => 'admin.covers.create.post', 'uses' => 'HeaderImageController@postCreate']);
		Route::get('covers/delete/{id}', ['as' => 'admin.covers.delete', 'uses' => 'HeaderImageController@delete']);
		Route::get('covers/change_status/{id}', ['as' => 'admin.covers.change', 'uses' => 'HeaderImageController@changeStatus']);

		Route::get('districts/', ['as' => 'admin.districts.all', 'uses' => 'DistrictController@getAll']);
		Route::get('districts/create/get', ['as' => 'admin.districts.create.get', 'uses' => 'DistrictController@getCreate']);
		Route::post('districts/create/post', ['as' => 'admin.districts.create.post', 'uses' => 'DistrictController@postCreate']);
		Route::get('districts/edit/get/{id}', ['as' => 'admin.districts.edit.get', 'uses' => 'DistrictController@getEdit']);
		Route::post('districts/edit/post/{id}', ['as' => 'admin.districts.edit.post', 'uses' => 'DistrictController@postEdit']);
		Route::get('districts/change_status/{id}', ['as' => 'admin.districts.change', 'uses' => 'DistrictController@changeStatus']);

		Route::get('sendMails', ['as' => 'sendMails.get', 'uses' => 'MailsController@getMail']);
		Route::post('sendMails/post', ['as' => 'sendMails.post', 'uses' => 'MailsController@postMail']);

		Route::get('agents/{company_id}', ['as' => 'admin.company.agents', 'uses' => 'CompanyController@getAgents']);
		Route::get('agents/change/{id}', ['as' => 'admin.agents.change', 'uses' => 'CompanyController@changeAgentStatus']);

		Route::get('users/search', ['as' => 'admin.users.search', 'uses' => 'UserController@search']);
		Route::get('expired', ['as' => 'admin.ads.expired', 'uses' => 'AdsController@getExpired']);
		Route::get('/company_package', ['as' => 'admin.company_package.index', 'uses' => 'CompanyController@getCompanyPackages']);
		Route::get('/company_package/{id}/list', ['as' => 'admin.company_package.list', 'uses' => 'CompanyController@company_list']);
		Route::post('/company_package/{company_package_id}/disable', ['as' => 'admin.company_package.disable', 'uses' => 'CompanyController@disable']);
		Route::post('/company_package/{company_package_id}/pending', ['as' => 'admin.company_package.pending', 'uses' => 'CompanyController@pending']);
		Route::post('/company_package/{company_package_id}/accept', ['as' => 'admin.company_package.accept', 'uses' => 'CompanyController@accept']);
		Route::post('/company_package/{company_package_id}/reject', ['as' => 'admin.company_package.reject', 'uses' => 'CompanyController@reject']);

		Route::get('repeated', ['as' => 'admin.ads.repeated', 'uses' => 'AdsController@getRepeated']);
		Route::get('special', ['as' => 'admin.ads.special', 'uses' => 'AdsController@getSpecial']);
		// Route::get('ads/search', ['as' => 'admin.ads.search', 'uses' => 'AdsController@search']);

		// Home Banners Ads
		Route::get('home_banners', ['as' => 'admin.home_banners.all', 'uses' => 'HomeBannerController@getAll']);
		Route::get('home_banners/edit/{id}', ['as' => 'admin.home_banners.edit', 'uses' => 'HomeBannerController@edit']);
		Route::post('home_banners/edit/{id}', ['as' => 'admin.home_banners.update', 'uses' => 'HomeBannerController@update']);
		Route::get('home_banners/view/{id}', ['as' => 'admin.home_banners.view', 'uses' => 'HomeBannerController@getById']);

		// Home Video
		Route::get('videos', ['as' => 'admin.videos.all', 'uses' => 'VideoConrtoller@getAll']);
		Route::get('videos/edit/{id}', ['as' => 'admin.videos.edit', 'uses' => 'VideoConrtoller@edit']);
		Route::post('videos/edit/{id}', ['as' => 'admin.videos.update', 'uses' => 'VideoConrtoller@update']);
		Route::get('videos/view/{id}', ['as' => 'admin.videos.view', 'uses' => 'VideoConrtoller@getById']);

		require 'packages/duration.php';
		require 'packages/ad_type.php';
		require 'packages/durationTypes.php';
		require 'packages/package.php';
		require 'packages/admin_subscription.php';
	});
});

Route::get('test2 ', function () {
	print Carbon\Carbon::now()->addMonths(1)->format('Y-m-d');
});



Route::get('/active-demo/{email} ', function ($email) {
	print "This page will redirect agent to frontend url to active agent account
	if you get this page please contact with me to change redirection url to your app
	";
	print Carbon\Carbon::now()->addMonths(1)->format('Y-m-d');
});

Route::get('tt', function () {
	$list =  collect(json_decode(request('ads'), true))->toArray();;
	return $list[0];
});

require_once 'site.php';
