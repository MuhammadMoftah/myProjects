<?php

Route::group(['prefix' => 'package', 'namespace' => 'Package', 'as' => 'admin.packages.'], function () {

    // Duration routes
    Route::get('/', ['as' => 'all', 'uses' => 'PackageController@getAll']);
    Route::get('/create', ['as' => 'create', 'uses' => 'PackageController@create']);
    Route::post('/post', ['as' => 'post', 'uses' => 'PackageController@post']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'PackageController@edit']);
    Route::post('/update/{id}', ['as' => 'update', 'uses' => 'PackageController@update']);
    Route::get('/{id}', ['as' => 'view', 'uses' => 'PackageController@getSinglePackage']);
    Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'PackageController@delete']);
    Route::get('/change/status/{id}', ['as' => 'status.change', 'uses' => 'PackageController@changeStatus']);
    Route::get('/change/active/{id}', ['as' => 'active.change', 'uses' => 'PackageController@changeActive']);
});
