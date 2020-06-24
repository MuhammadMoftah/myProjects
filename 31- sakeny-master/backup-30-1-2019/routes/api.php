<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace'=>'Api'], function(){

	Route::group(['prefix' => 'v1','namespace'=>'V1'], function() {

		Route::group(['prefix'=>'user', 'namespace'=>'User'], function(){ // application name
			Route::group(['prefix' => 'auth'], function() {

				# Regular Authentication
			    Route::post('signup','AuthController@signup');
			    Route::post('signin','AuthController@signin');

			    # Socialmedia authentication
			    Route::post('social-media-authentication','AuthController@postSocialMediaAuthentication');
			    Route::post('social-media-register','AuthController@postSocialMediaRegister');

				# Reset password
			    Route::post('password/email','AuthController@postSendResetPasswordCode');
			    Route::patch('password/reset','AuthController@patchResetPassword');


			    Route::group(['middleware'=>'auth:api'], function(){
				    # Account Activation via sms
				    Route::patch('active-account','AuthController@postActiveAccount');
					Route::post('resend-activation-code', 'AuthController@postResendActivationCode');

					# Account Setting

				    # refresh user data
				    Route::get('get-profile', 'AuthController@getProfile');
				    Route::get('notifications', 'AuthController@getNotifications');
				    Route::patch('notifications/{id}', 'AuthController@patchNotificationSeen');

				    Route::patch('update-profile', 'AuthController@updateProfile');
				    Route::patch('update-password', 'AuthController@updatePassword');

				    Route::post('request-update-phone', 'AuthController@requestUpdatePhone');
				    Route::patch('update-phone', 'AuthController@updatePhone');

			    });

			});

			Route::group(['prefix' => 'chat', 'middleware'=>'auth:api'], function() {
				Route::resource('chat','ChatController');
				Route::patch('chat/{room_id}/update-status','ChatController@updateChatStatus');
				Route::patch('chat/{user_id}/seen','ChatController@patchMessageSeen');
				Route::get('notifications','ChatController@getAdsChatNotifications');
				Route::post('chat/{room_id}/update-seen','ChatController@makeChatSeen');


			});

			Route::group(['prefix' => 'app'], function() {
				// Route::get('home','ApplicationController@getHome');
				// Route::get('ads-by-company-id/{id}','ApplicationController@getAdsByCompanyId');
				// Route::get('ads-by-city-id/{id}','ApplicationController@getAdsByCityId');


				Route::group(['middleware'=>'auth:api'], function(){
					Route::resource('ads','AdsController');
					Route::post('ads/{id}','AdsController@update');
					Route::post('ads/{id}/premium','AdsController@patchUpdateAdToPremuim');
					Route::patch('ads/{id}/deactive','AdsController@patchDeactive');
					Route::delete('ads/{ads_id}/images/{image_id}','AdsController@destroyImage');
					Route::patch('ads/{id}/renew','AdsController@patchRenewAd');
					Route::patch('ads/{id}/renew-company','AdsController@patchRenewAdCompany');
					Route::post('ads/{id}/premium-company','AdsController@patchUpdateAdToPremuimCompany');

					Route::group(['prefix' => 'chat'], function() {
						Route::resource('chat','ChatController');
						Route::post('chat/{id}/request','ChatController@postRequestMeeting');
						Route::patch('chat/{room_id}/update-status','ChatController@updateChatStatus');
						Route::patch('chat/{user_id}/seen','ChatController@patchMessageSeen');
					});

				});
			});
		});

		# general
		Route::group(['prefix' => 'app'], function() {
			Route::get('home','ApplicationController@getHome');
			Route::get('banners','ApplicationController@getBanners');
			Route::get('ads-by-company-id/{id}','ApplicationController@getAdsByCompanyId');
			Route::get('ads-by-city-id/{id}','ApplicationController@getAdsByCityId');
			Route::get('ads-by-agent-id/{id}','ApplicationController@getAdsByAgentId');
			Route::get('packages','ApplicationController@getPackages');
			Route::get('ad/{id}','ApplicationController@getAd');
			Route::post('ad/{id}/attach','ApplicationController@attachVideo');
			Route::get('ads-search','ApplicationController@getSearchAds');
			Route::post('save-search','ApplicationController@saveSearch');
			Route::get('saved-search-list','ApplicationController@savedSearchList');
			Route::post('save-compare-ads','ApplicationController@saveCompareAds');
			Route::get('saved-compare-ads-list','ApplicationController@savedCompareAdsList');
			Route::post('contact-us','ApplicationController@postContactUs');
			Route::get('data-meta','ApplicationController@getMetaData');
			Route::get('blog', 'ApplicationController@getBlog');
			Route::get('blog/{id}', 'ApplicationController@getBlogById');
			Route::get('life-style', 'ApplicationController@getLifeStyle');
			Route::get('ads-list','ApplicationController@getAdsList');
			Route::get('projects','ApplicationController@getProjects');
			Route::get('projects/{id}','ApplicationController@getProject');
			Route::post('projects/{id}/contact','ApplicationController@sendMailToProject');
			Route::get('countries','ApplicationController@getCountries');

            Route::post('send-email','ApplicationController@sendEmail');


			Route::group(['middleware'=>'auth:api'], function(){
				Route::post('ads-report','ApplicationController@postReport');
				Route::post('ads-favourite','ApplicationController@postFavourite');
				Route::get('profile/favourites','ApplicationController@getFavourite');
			});
		});
		Route::group(['prefix' => 'app/mobile'], function() {
			Route::get('home','MobileApplicationController@getHome');
			Route::get('public-ads','MobileApplicationController@getPublicAds');

		});
	});

	Route::group(['prefix' => 'v1/company', 'namespace'=>'V1\Company'], function() {

		Route::group(['prefix' => 'auth'], function() {


			# Regular Authentication
		    Route::post('signup','AuthController@signup');
		    Route::post('signin','AuthController@signin');
		    Route::get('splash-page','AuthController@getSplashRegistartionCompanies');
		    Route::get('splash-page/{id}','AuthController@getSplashRegistartionCompany');

			# Reset password
		    Route::post('password/email','AuthController@postSendResetPasswordCode');
		    Route::patch('password/reset','AuthController@patchResetPassword');


		    Route::group(['middleware'=>'auth:api'], function(){
			    # Account Activation via sms
			    Route::patch('active-account','AuthController@postActiveAccount');
				Route::post('resend-activation-code', 'AuthController@postResendActivationCode');

				# Account Setting

			    # refresh user data
			    Route::get('get-profile', 'AuthController@getProfile');

			    Route::patch('update-profile', 'AuthController@updateProfile');
			    Route::patch('update-password', 'AuthController@updatePassword');

			    Route::post('request-update-phone', 'AuthController@requestUpdatePhone');
			    Route::patch('update-phone', 'AuthController@updatePhone');

		    });

		});  # end of auth area

		Route::group(['prefix' => 'app'], function() {
			Route::group(['middleware'=>'auth:api'], function(){
				Route::resource('ads','AdsController');
				Route::post('ads/{id}/premium','AdsController@patchUpdateAdToPremuim');
				Route::post('ads/{id}/repost','AdsController@postRepost');

				Route::post('ads/{id}','AdsController@update');
				Route::patch('ads/{id}/deactive','AdsController@patchDeactive');
				Route::delete('ads/{ads_id}/images/{image_id}','AdsController@destroyImage');
				Route::patch('ads/{id}/renew','AdsController@patchRenewAd');
				Route::patch('ads/{id}/assign-agent','AdsController@assignAgent');
				Route::resource('payment','PaymentController',['only'=>'store']);
				Route::resource('agent','AgentController');
				Route::post('agent/{id}','AgentController@update');

			});
		}); # end of company area

	});



	Route::group(['prefix' => 'v1/agent', 'namespace'=>'V1\Agent'], function() {

		Route::group(['prefix' => 'auth'], function() {


		    Route::post('signin','AuthController@signin');
		    //api/v1/agent/auth/invitation/{email}
		    Route::get('invitation/{email}/{api_token}', function($email){
		    	return redirect("/active-demo/{$email}");
		    });
			# Reset password
		    Route::post('password/email','AuthController@postSendResetPasswordCode');
		    Route::patch('password/reset','AuthController@patchResetPassword');


		    Route::group(['middleware'=>'auth:api'], function(){

		    	# Activated registration
			    Route::post('signup','AuthController@signup');
			    # refresh user data
			    Route::get('get-profile', 'AuthController@getProfile');

			    Route::patch('update-profile', 'AuthController@updateProfile');
			    Route::patch('update-password', 'AuthController@updatePassword');

			    Route::post('request-update-phone', 'AuthController@requestUpdatePhone');
			    Route::patch('update-phone', 'AuthController@updatePhone');

		    });

		});  # end of auth area

		Route::group(['prefix' => 'app'], function() {
			Route::group(['middleware'=>'auth:api'], function(){
				Route::resource('ads','AdsController');
				Route::post('ads/{id}/premium','AdsController@patchUpdateAdToPremuim');
				Route::post('ads/{id}','AdsController@update');
				Route::patch('ads/{id}/deactive','AdsController@patchDeactive');
				Route::delete('ads/{ads_id}/images/{image_id}','AdsController@destroyImage');
				Route::patch('ads/{id}/renew','AdsController@patchRenewAd');

			});
		}); # end of company area

	});




	//V2 .... App2 ... etc


});

