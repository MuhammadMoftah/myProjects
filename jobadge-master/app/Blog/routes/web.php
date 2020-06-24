<?php

Route::group([
    'prefix' => 'blog', 
    'namespace'=>'\App\Blog\Controllers\Web',
    "middleware"=>["web"],
    'as' => 'web.blog.'
    ], function(){


    Route::group(['as' => 'user.'], function(){

      Route::get("/","UserBlogController@index")->name("home");


      Route::get("/like-action","UserBlogController@likeAction")->name("like");


      Route::get("/home_2","UserBlogController@index2")->name("home2");

     

      Route::group(["middleware"=>["any_user_auth"], ], function(){

        Route::post("/comment","UserBlogController@comment")->name("comment.post");


        Route::post("/like","UserBlogController@like")->name("like.post");


        Route::post("/report","UserBlogController@report")->name("report.post");

        Route::post("/{comment}/delete", "UserBlogController@commentDelete" )->name("comment.delete");

      });  

      
      Route::get("/share/{provider}/{blog}","UserBlogController@shareProfile")->name("share");
      Route::get("/{slug}","UserBlogController@details")->name("details");
      
      

     

    });

    


});


// admin ==================================================================

Route::group(
  [
    'prefix' => 'admin',
    "middleware"=>["web"],
    'as' => 'admin.',
    'namespace'=>'\App\Blog\Controllers\Web',
  ]
  , function () {

  // auth
  Route::group(['prefix' => 'blogs' ,'middleware' => ['admin_auth'] ,'as' => 'blogs.'], function () {

      Route::get("/","AdminBlogController@index")->name("index");

      Route::get("/new","AdminBlogController@create")->name("create");

      Route::get("/{blog}/edit","AdminBlogController@update")->name("edit");

      Route::post("/{blog}/update","AdminBlogController@edit")->name("update");

      Route::post("/{blog}/delete","AdminBlogController@destory")->name("delete");

      Route::post("/","AdminBlogController@store")->name("store");

      Route::get("/search","AdminBlogController@search")->name("search");


      // ================== report ========
      Route::group(['prefix' => 'reports','as' => 'report.'], function () {

        Route::get("/","CommentReportController@index")->name("index");

        Route::get("/{report}","CommentReportController@show")->name("show");

      
        Route::post("/{report}/delete","CommentReportController@destory")->name("delete");

      });

      // ================== report ========
      Route::group(['prefix' => 'comments','as' => 'comments.'], function () {

        Route::get("{comment}/toggle","CommentAdminController@toggle")->name("toggle");

      });




  });

});