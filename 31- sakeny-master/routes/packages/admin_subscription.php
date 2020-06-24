<?php

Route::group(['prefix' => 'subscription', 'namespace' => 'Package', 'as' => 'admin.subscriptions.'], function () {

    // Subscription  routes
    Route::get('/', ['as' => 'all', 'uses' => 'SubscriptionController@getAll']);
    Route::get('/{id}', ['as' => 'view', 'uses' => 'SubscriptionController@getSingle']);
    Route::get('/approve/{id}', ['as' => 'approve', 'uses' => 'SubscriptionController@approve']);
    Route::get('/active/{id}', ['as' => 'active', 'uses' => 'SubscriptionController@active']);
});