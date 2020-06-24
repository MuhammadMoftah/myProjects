<?php

Route::group(['prefix' => 'duration', 'namespace' => 'Package', 'as' => 'admin.durations.'], function () {

    // Duration routes
    Route::get('/', ['as' => 'all', 'uses' => 'DurationController@getAll']);
    Route::get('/create', ['as' => 'create', 'uses' => 'DurationController@create']);
    Route::post('/post', ['as' => 'post', 'uses' => 'DurationController@post']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'DurationController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'DurationController@update']);
});
