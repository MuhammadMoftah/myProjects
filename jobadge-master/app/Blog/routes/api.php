<?php

Route::group(
    [
    'prefix' => 'api', 
    'namespace'=>'\App\Blog\Controllers\Api',
    'as' => 'api',
    "middleware"=>["api"]
    ], function(){


    
    

});