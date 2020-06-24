<?php

Route::group(['prefix' => 'adType', 'namespace' => 'Package', 'as' => 'admin.ad_type.'], function () {

    // AdType  routes
    Route::get('/', ['as' => 'all', 'uses' => 'AdTypeController@getAll']);
    Route::get('/create', ['as' => 'create', 'uses' => 'AdTypeController@create']);
    Route::post('/post', ['as' => 'post', 'uses' => 'AdTypeController@post']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AdTypeController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'AdTypeController@update']);
    Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'AdTypeController@delete']);
});
