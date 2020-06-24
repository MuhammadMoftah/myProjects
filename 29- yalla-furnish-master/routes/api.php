<?php

use Illuminate\Http\Request;
Route::group(['middleware'=>'api','namespace'=>'api'],function(){
    require 'Routes/api.php';
});
