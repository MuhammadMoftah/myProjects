<?php

Route::group(['prefix' => 'durationtype', 'namespace' => 'Package', 'as' => 'admin.durationtypes.'], function () {
    Route::get('/', ['as' => 'all', 'uses' => 'DurationTypeController@getAll']);
    Route::get('/create', ['as' => 'create', 'uses' => 'DurationTypeController@create']);
    Route::post('/post', ['as' => 'post', 'uses' => 'DurationTypeController@post']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'DurationTypeController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'DurationTypeController@update']);
});
