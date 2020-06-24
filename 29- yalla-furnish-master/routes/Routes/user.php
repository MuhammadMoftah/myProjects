<?php
Route::get('/newCreate/showroom', ['as' => 'user.new.create.showroom', 'uses' => 'user\UserController@getNewShowroomCreate']);

Route::get('/', ['as' => 'user.index', 'uses' => 'user\UserController@getIndex']);
Route::get('/about', ['as' => 'user.get.about', 'uses' => 'user\UserController@getAbout']);
Route::get('/terms', ['as' => 'user.get.terms', 'uses' => 'user\UserController@getTerms']);
Route::get('/contact', ['as' => 'user.get.contact', 'uses' => 'user\UserController@getContact']);
Route::post('/contact', ['as' => 'user.post.contact', 'uses' => 'user\UserController@postContact']);

// products
Route::get('/products/{categorySlug?}',  'user\ProductController@getProducts')->name('user.get.products');
Route::get('/productsAjex/{categorySlug?}',  'user\ProductController@getProductsAjex')->name('user.get.productsAjex');
Route::get('/malls',  'user\MallController@getAllMalls')->name('user.get.malls');
Route::get('/mall/{id}',  'user\MallController@getSingleMall')->name('user.get.mall');
Route::get('/offers', ['as' => 'user.get.offers', 'uses' => 'user\OfferController@getOffers']);

Route::get('/offersAjex', ['as' => 'user.get.offersAjex', 'uses' => 'user\OfferController@getOffersAjex']);
Route::get('/product/{id}', ['as' => 'user.product.get', 'uses' => 'user\ProductController@getSingleProduct']);
Route::get('/offer/{id}', ['as' => 'user.offer.get', 'uses' => 'user\OfferController@getSingleOffer']);

// showrooms
Route::get('/showrooms', ['as' => 'user.get.showrooms', 'uses' => 'user\ShowroomController@index']);

// showroom profile
Route::get('/showroom/{slug}', 'user\ShowroomController@SingleShowroom')->name('user.get.singleShowroom');
Route::get('/showroom/products/{id}', ['as' => 'user.showroom.products', 'uses' => 'user\ProductController@getShowRoomProduct']);
Route::post('/add/info', ['as' => 'add.showroom.info', 'uses' => 'user\ShowroomController@addInfo']);
Route::get('/districts/city', ['as' => 'user.get.districts', 'uses' => 'admin\DistrictController@getDistrictCity']);
Route::get('/cities/country', ['as' => 'user.get.cities', 'uses' => 'user\UserController@getCountryCities']);

// ideas routes
Route::get('/ideas', 'user\IdeaController@get_ideas')->name('get_all_ideas');
Route::get('/ideasAjex', 'user\IdeaController@get_ideasAjex')->name('get_all_ideasAjex');
Route::get('/idea/{id}', ['as' => 'user.get.idea', 'uses' => 'user\IdeaController@getSingleIdea']);

// users
Route::get('/profile/{id}', ['as' => 'user.view.profile', 'uses' => 'user\UserController@view_user_profile']);

// topics
Route::get('/topics', ['as' => 'user.get.topics', 'uses' => 'user\TopicController@getTopics']);
Route::get('/topic/{id}', ['as' => 'user.get.topic', 'uses' => 'user\TopicController@getSingleTopic']);

Route::get('/user/board/{id}', ['as' => 'user.board.view', 'uses' => 'user\BoardController@getUserBoard']);

// advanced search
Route::get('/advancedSearch/showrooms', ['as' => 'advanced.search.showrooms', 'uses' => 'user\ShowroomController@advancedSearch']);
Route::get('/advancedSearch/offers', ['as' => 'advanced.search.offers', 'uses' => 'user\OfferController@advancedSearch']);
Route::get('/advancedSearch/products', ['as' => 'advanced.search.products', 'uses' => 'user\ProductController@advancedSearch']);
Route::get('/advancedSearch/ideas', ['as' => 'advanced.search.ideas', 'uses' => 'user\IdeaController@advancedSearch']);

Route::group(['middleware' => 'user_not_auth'], function () {

    // user authentication
    Route::get('/register', ['as' => 'user.register.get', 'uses' => 'user\UserController@getRegister']);
    Route::post('/register', ['as' => 'user.register.post', 'uses' => 'user\UserController@postRegister']);
    Route::get('/login', ['as' => 'user.login.get', 'uses' => 'user\UserController@getLogin']);
    Route::post('/login', ['as' => 'user.login.post', 'uses' => 'user\UserController@postLogin']);

    Route::get('/forgetpassword', ['as' => 'user.forget.get', 'uses' => 'user\UserController@getForgetPassword']);
    Route::post('/forgetpassword', ['as' => 'user.forget.post', 'uses' => 'user\UserController@postForgetPassword']);

    Route::get('/newpassword/{token}', ['as' => 'user.newpassword.get', 'uses' => 'user\UserController@getNewPassword']);
    Route::post('/newpassword/{token}', ['as' => 'user.newpassword.post', 'uses' => 'user\UserController@postNewPassword']);
});

Route::group(['middleware' => 'user_auth'], function () {

    // Notification
    Route::get('/notification/{id}', 'user\NotificationController@getNotification')->name('user.read.notification');

    // polymorphic Comment routes 
    Route::post('/comment-store', 'CommentController@store')->name('user.comment.store');
    
    Route::post('/comment-delete', 'CommentController@destroy')->name('user.comment.delete');
    Route::post('/comment-update', 'CommentController@update')->name('user.comment.update');

    // polymorphic Reply routes 
    Route::post('/reply-store', 'ReplyController@store')->name('user.reply.store');
    Route::post('/reply-delete', 'ReplyController@delete')->name('user.reply.delete');
    Route::post('/reply-update', 'ReplyController@update')->name('user.reply.update');

    // idea share
    Route::get('/idea/share/{id}/{provider}', 'user\IdeaController@shareIdea')->name('user.idea.share');
    Route::get('/idea/{id}/email-share', 'user\IdeaController@getEmailShare')->name('user.idea.shareViaEmail');
    Route::post('/idea/{id}/email-share', 'user\IdeaController@postEmailShare')->name('user.idea.shareViaEmailPost');

    Route::get('/follow_showroom', 'user\ShowroomController@followShowroom')->name('user.follow.showroom');
    Route::get('/user/sendMessage', 'user\ShowroomController@send_message')->name('user.send.message');
    Route::post('/sendMessage', 'user\ShowroomController@stroe_message')->name('user.store.message');
    Route::get('/follow_user', 'user\UserController@follow_user')->name('user.follow.user');
    Route::post('/edit/profile', ['as' => 'edit.user.profile', 'uses' => 'user\UserController@editProfile']);
    Route::get('/MyProfile', ['as' => 'user.my.profile', 'uses' => 'user\UserController@my_profile']);
    Route::get('/logout', ['as' => 'user.logout', 'uses' => 'user\UserController@logout']);

    Route::get('/user/messages', ['as' => 'user.my.messages', 'uses' => 'user\UserController@Messages']);
    // Route::get('/Messages/{showroom_id}',  'user\UserController@ShowroomMessages')->name('user.myMessages.showroom');

    // boards
    Route::get('/my/board/{id}', ['as' => 'user.board', 'uses' => 'user\BoardController@getSingleBoard']);

    // topics
    Route::post('/topic/post', 'user\TopicController@postCreateTopic')->name('user.topic.create.post');
    Route::post('/topic/{id}/delete', 'user\TopicController@postDeleteTopic')->name('user.topic.delete');
    Route::post('/topic/{id}/update', 'user\TopicController@postUpdateTopic')->name('user.topic.update');
    Route::get('/topic/{id}/edit', 'user\TopicController@getEditTopic')->name('user.topic.edit');
    Route::get('/topic/{id}/share/{provider}', 'user\TopicController@shareTopic')->name('user.topic.share');
    Route::get('/topic/{id}/email-share', 'user\TopicController@getEmailShare')->name('user.topic.shareViaEmail');

    Route::post('/topic/{id}/email-share', 'user\TopicController@postEmailShare')->name('user.topic.postshareViaEmail');

    // activites
    Route::get('/delete/activity', ['as' => 'delete.activity', 'uses' => 'user\UserController@deleteActivity']);

    // showrooms
    Route::get('/create/showroom', ['as' => 'user.create.showroom', 'uses' => 'user\ShowroomController@create']);
    Route::post('/showroom', ['as' => 'user.store.showroom', 'uses' => 'user\ShowroomController@store']);
    Route::get('/suspend/showroom/{id}', ['as' => 'user.suspend.showroom', 'uses' => 'user\ShowroomController@suspend_showroom']);
    Route::get('/edit/showroom/{id}', ['as' => 'user.edit.showroom', 'uses' => 'user\ShowroomController@edit_showroom']);

    Route::post('/update/showroom/{id}', ['as' => 'user.update.showroom', 'uses' => 'user\ShowroomController@update_showroom']);
    Route::post('/update/showroom/slug/{id}', ['as' => 'user.showroom.request.slug', 'uses' => 'user\ShowroomController@updateSlug']);

    Route::post('/review', ['as' => 'user.store.review', 'uses' => 'user\ShowroomController@store_review']);

    Route::post('/edit-review', ['as' => 'user.update.review', 'uses' => 'user\ShowroomController@edit_review']);

    Route::delete('/delete-review', ['as' => 'user.delete.review', 'uses' => 'user\ShowroomController@delete_review']);

    // Route::get('/dashboard/{id}/{u_id?}/{read?}', ['as' => 'user.my.dashboard', 'uses' => 'user\ShowroomController@getDashboard']);
    Route::get('/dashboard/{id}/info', 'user\ShowroomController@getDashboardInfo')->name('user.my.dashboardInfo');
    Route::get('/dashboard/{id}/offers',  'user\ShowroomController@getDashboardOffers')->name('user.my.dashboardOffers');
    Route::get('/dashboard/{id}/products',  'user\ShowroomController@getDashboardProducts')->name('user.my.dashboardProducts');

    Route::get('/showroom_messages/{id}', 'user\ShowroomController@get_showroom_messages')->name('showroom.get.messages');
    Route::post('/replyMessage', 'user\ShowroomController@reply_message')->name('showroom.store.message');

    // chat actions 
    Route::get('/dashboard/{id?}/chat/{u_id?}/{read?}', 'user\ShowroomController@getDashboardChat')->name('user.my.dashboardChat');
    Route::post('/deleteChat', 'user\ShowroomController@deleteChat')->name('user.showroom.deleteChat');
    Route::post('/unreadChat', 'user\ShowroomController@unreadChat')->name('user.showroom.unreadChat');
    Route::post('/blockChat', 'ChatBlockController@store')->name('user.chatBlock');
    Route::post('/pinChat', 'ChatFollowController@store')->name('user.ShowroomChat.pin');
    Route::post('/unpinChat', 'ChatFollowController@destroy')->name('user.ShowroomChat.unpin');

    Route::post('/store/branch/{id}', ['as' => 'user.store.branch', 'uses' => 'user\ShowroomController@storeBranch']);
    Route::post('/update/branch/{id}', ['as' => 'user.update.branch', 'uses' => 'user\ShowroomController@updateBranch']);

    Route::post('/delete/branch/{id}', ['as' => 'user.delete.branch', 'uses' => 'user\ShowroomController@DeleteBranch']);

    // products
    Route::get('/product/create/{showroom_id}', ['as' => 'user.product.create.get', 'uses' => 'user\ProductController@getCreateProduct']);
    Route::post('/product/post/{showroom_id}', ['as' => 'user.product.create.post', 'uses' => 'user\ProductController@postCreateProduct']);

    Route::post('/product/request-price', ['as' => 'user.product.request_price.post', 'uses' => 'user\ProductController@requestPrice']);
    // share product via social media 
    Route::get('/product/share/{id}/{provider}', ['as' => 'user.product.share', 'uses' => 'user\ProductController@shareProduct']);
    // share product via Mail
    Route::get('/product/{id}/email-share', 'user\ProductController@getEmailShare')->name('user.product.shareViaEmail');
    Route::post('/product/{id}/email-share', 'user\ProductController@postEmailShare')->name('user.product.shareViaEmailPost');

    Route::get('/compare_product/{product_id}', ['as' => 'user.product.compare', 'uses' => 'user\ProductController@CompareProduct']);
    Route::get('/comparison_table', ['as' => 'user.get.comparison_table', 'uses' => 'user\ProductController@get_comparison_table']);
    Route::get('/delete/comparisnon_table_product/{product_id}', ['as' => 'delete.comparison_table.product', 'uses' => 'user\ProductController@delete_comparison_table_product']);
    Route::get('/save/product', ['as' => 'save.product', 'uses' => 'user\SavedItemController@save_item']);
    Route::post('/item/{id}/delete', ['as' => 'user.item.delete', 'uses' => 'user\SavedItemController@deleteItem']);
    Route::post('/product/rate/{id}', ['as' => 'product.rate', 'uses' => 'user\ProductController@rateProduct']);
    Route::get('/product/edit/{showroom_id}/{id}', ['as' => 'user.product.edit', 'uses' => 'user\ProductController@getEditProduct']);
    Route::post('/product/update/{showroom_id}/{id}', ['as' => 'user.product.update', 'uses' => 'user\ProductController@postEditProduct']);
    Route::get('/product/delete_image/{id}/{product_id}', ['as' => 'delete.product.image', 'uses' => 'user\ProductController@deleteProductImage']);
    Route::get('/delete/product/{showroom_id}/{id}', ['as' => 'user.product.delete', 'uses' => 'user\ProductController@deleteProduct']);
    Route::get('/delete/offer/{showroom_id}/{id}', ['as' => 'user.offer.delete', 'uses' => 'user\OfferController@deleteOffer']);

    // likes
    Route::get('/item/like/{id}/{type}',  'user\LikeController@likeItem')->name('item.like');

    // boards
    Route::post('/update/board/{id}', ['as' => 'update.board', 'uses' => 'user\BoardController@update_board']);
    Route::post('/board/store', ['as' => 'user.board.store', 'uses' => 'user\BoardController@postBoard']);
    Route::get('/board/create/save', ['as' => 'create.save.board', 'uses' => 'user\BoardController@create_save']);
    Route::post('/board/{id}/delete', ['as' => 'user.board.delete', 'uses' => 'user\BoardController@deleteBoard']);

    // topic comments
    Route::post('/topic-comment-edit', 'user\TopicCommentController@editComment')->name('user.topic.comment.edit');
    Route::post('/topic-comment-delete', 'user\TopicCommentController@deleteComment')->name('user.topic.comment.delete');
    Route::post('/topic/comment/{topic_id}',  'user\TopicCommentController@storeComment')->name('user.topic.comment.store');

    Route::get('/topic/comment/like/{comment_id}', ['as' => 'user.topic.comment.like', 'uses' => 'user\TopicCommentLikeController@likeComment']);
    Route::post('/topic/comment/reply/{comment_id}', ['as' => 'user.topic.reply.store', 'uses' => 'user\TopicCommentReplyController@storeReply']);
    Route::post('/topic-comment-reply-edit',    'user\TopicCommentReplyController@editReply')->name('user.topic.reply.edit');
    Route::post('/topic-comment-reply-delete',    'user\TopicCommentReplyController@deleteReply')->name('user.topic.reply.delete');
    Route::get('/topic/reply/like/{reply_id}', ['as' => 'user.topic.reply.like', 'uses' => 'user\TopicReplyLikeController@likeReply']);

    // product comments
    Route::post('/product/comment/{product_id}', 'user\ProductCommentController@storeComment')->name('user.product.comment.store');
    Route::post('/product/comment/reply/{comment_id}', 'user\ProductCommentReplyController@storeReply')->name('user.product.reply.store');
    Route::get('/product/reply/like/{reply_id}', ['as' => 'user.product.reply.like', 'uses' => 'user\ProductReplyLikeController@likeReply']);
    Route::get('/product/comment/like/{comment_id}', ['as' => 'user.product.comment.like', 'uses' => 'user\ProductCommentLikeController@likeComment']);

    // design 
    Route::post('/upload/background', 'user\BackgroundController@uploadBackground')->name('user.upload.background');
    Route::get('/user/background', 'user\BackgroundController@getBackgroundSet')->name('user.background.set');
    Route::get('/user/design/{background}/{type}', 'user\BackgroundController@getDesign')->name('user.design');
    Route::post('/user/store/background', 'user\BackgroundController@storeBackground')->name('user.storeBackground');

    // idea comments
    Route::post('/idea/comment/{comment_id}', 'user\IdeaCommentController@storeComment')->name('user.idea.comment.store');
    Route::post('/idea/comment/{commentId}/delete', 'user\IdeaCommentController@deleteComment')->name('user.idea.comment.delete');
    Route::post('/idea/comment/{commentId}/edit', 'user\IdeaCommentController@editComment')->name('user.idea.comment.edit');
    Route::get('/idea/comment/like/{comment_id}',  'user\IdeaCommentLikeController@likeComment')->name('user.idea.comment.like');

    // idea comment-reply
    Route::post('/idea/comment/reply/{comment_id}', 'user\IdeaCommentReplyController@storeReply')->name('user.idea.reply.store');
    Route::post('/idea/reply/{replyId}/delete', 'user\IdeaCommentReplyController@deleteReply')->name('user.idea.reply.delete');
    Route::post('/idea/reply/{replyId}/edit', 'user\IdeaCommentReplyController@editReply')->name('user.idea.reply.edit');
    Route::get('/idea/reply/like/{reply_id}',  'user\IdeaReplyLikeController@likeReply')->name('user.idea.reply.like');;

    //content creator
    Route::group(['middleware' => 'creator_auth'], function () {
        Route::get('/creator/idea', ['as' => 'creator.create.get', 'uses' => 'user\CreatorController@create']);
        Route::post('/creator/idea/post', ['as' => 'creator.create.post', 'uses' => 'user\CreatorController@store']);
        Route::get('/creator/idea/delete/{id}', ['as' => 'creator.delete', 'uses' => 'user\CreatorController@delete']);
        Route::get('/creator/idea/edit/{id}', ['as' => 'creator.edit', 'uses' => 'user\CreatorController@edit']);
        Route::post('/creator/idea/update', ['as' => 'creator.update', 'uses' => 'user\CreatorController@update']);

        Route::group(['as' => 'creator.paragraphs'], function () {
            Route::post('/paragraph/post/{idea_id}', ['as' => '.post', 'uses' => 'user\CreatorController@storeParagraph']);
            Route::get('/paragraph/delete/{id}', ['as' => '.delete', 'uses' => 'user\CreatorController@deleteParagraph']);
            Route::post('/paragraph/update/{id}', ['as' => '.update', 'uses' => 'user\CreatorController@updateParagraph']);
        });
    });

    Route::get('/user/products/store/session/{id}', ['as' => 'user.products.session', 'uses' => 'user\ProductController@storeProductInSession']);
    Route::get('/user/products/remove/session/{id}', ['as' => 'user.products.remove.session', 'uses' => 'user\ProductController@removeProductInSession']);
    Route::get('/user/products/clear/session', ['as' => 'user.products.session.clear', 'uses' => 'user\ProductController@clearProductsSession']);

    // consultants
    Route::post('/user/consultant/post', ['as' => 'user.consultant.store', 'uses' => 'user\ConsultantController@store']);
});
