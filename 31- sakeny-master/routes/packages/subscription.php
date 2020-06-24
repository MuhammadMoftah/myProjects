<?php

Route::group(['middleware' => 'user_auth', 'namespace' => 'User', 'as' => 'user.packages.', 'prefix' => 'user'], function () {
    Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'SubscriptionController@userSubscribe']);
});

Route::group(['middleware' => 'company_auth', 'namespace' => 'Company', 'as' => 'company.packages.', 'prefix' => 'company'], function () {
    Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'SubscriptionController@companySubscribe']);
});
