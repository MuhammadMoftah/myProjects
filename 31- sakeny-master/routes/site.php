<?php

// Route::get('/{lang}', ['as' => 'user.change.lang', 'uses' => 'User\UserController@changeLang']);
Route::get('/locale/{lang}', ['as' => 'user.change.lang', 'uses' => 'User\UserController@changeLang']);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect',  'localeViewPath', 'localize'],
], function () {

    // Route::get('/locale/{lang}', ['as' => 'user.change.lang', 'uses' => 'User\UserController@changeLang']);

    Route::get('/', ['as' => 'user.index', 'uses' => 'User\UserController@getIndex']);
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.thankyou'),
        ['as' => 'user.thankyou', 'uses' => 'User\UserController@getThankYou']
    );

    //Auth 
    Route::group(['middleware' => 'user_not_auth'], function () {
        Route::get(
            '/' . LaravelLocalization::transRoute('routes.user_login'),
            ['as' => 'user.login.get', 'uses' => 'User\UserController@getUserLogin']
        );
        Route::get(
            '/' . LaravelLocalization::transRoute('routes.user_register'),
            ['as' => 'user.register.get', 'uses' => 'User\UserController@getUserRegister']
        );
        Route::get(
            '/' . LaravelLocalization::transRoute('routes.company_registertion'),
            ['as' => 'company.register.get', 'uses' => 'User\UserController@getCompanyRegister']
        );
        Route::post(
            '/' . LaravelLocalization::transRoute('routes.company_register_post'),
            ['as' => 'company.register.post', 'uses' => 'User\UserController@postCompanyRegister']
        );

        Route::post(
            '/' . LaravelLocalization::transRoute('routes.user_register_post'),
            ['as' => 'user.register.post', 'uses' => 'User\UserController@postUserRegister']
        );
    });




    Route::get(
        '/' . LaravelLocalization::transRoute('routes.projects_search'),
        ['as' => 'user.search.projects', 'uses' => 'User\UserController@getProjects']
    );
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.aboutus'),
        ['as' => 'user.aboutus', 'uses' => 'User\UserController@getAboutUs']
    );

    Route::get(
        '/' . LaravelLocalization::transRoute('routes.properties_for_rent'),
        ['as' => 'user.rent', 'uses' => 'User\UserController@getRents']
    );

    Route::get(
        '/' . LaravelLocalization::transRoute('routes.properties_for_sale'),
        ['as' => 'user.sales', 'uses' => 'User\UserController@getSales']
    );



    Route::group(['middleware' => 'user_auth'], function () {
        Route::get(
            '/'  . LaravelLocalization::transRoute('routes.user_create_ad'),
            ['as' => 'user.ad.create', 'uses' => 'User\UserController@AdCreateGet']
        );
    });
    // new url
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.properties_for_sale_apartments_only'),
        ['as' => 'user.apartments.sale', 'uses' => 'User\UserController@getApartmentsSale']
    );
    // new url - search by city for sales
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.properties_for_sale_apartments_only_by_district'),
        ['as' => 'user.properties.discrete', 'uses' => 'User\UserController@getApartmentsDistrictSale']
    );
    //  new url
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.properties_for_rent_apartments_only'),
        ['as' => 'user.apartments.rent', 'uses' => 'User\UserController@getApartmentsRent']
    );

    Route::get(
        '/' . LaravelLocalization::transRoute('routes.ads_search'),
        ['as' => 'user.search.ads', 'uses' => 'User\UserController@search']
    );

    Route::get(
        '/' . LaravelLocalization::transRoute('routes.search_ads_by_district'),
        ['as' => 'user.district.ads', 'uses' => 'User\UserController@getDistrictAds']
    );

    Route::get('/user/logout', ['as' => 'user.logout', 'uses' => 'User\UserController@userLogout']);


    // contact us  
    Route::get(
        '/' . LaravelLocalization::transRoute('routes.contact_us'),
        ['as' => 'user.contactUs', 'uses' => 'User\ContactUsController@contactUs']
    );
    Route::post(
        '/' . LaravelLocalization::transRoute('routes.contact_us'),
        ['as' => 'user.contactUs.post', 'uses' => 'User\ContactUsController@contactUSPost']
    );
});



Route::group(['middleware' => 'localization'], function () {
    // Route::get('/{lang}/thankyou', ['as' => 'user.thankyou', 'uses' => 'User\UserController@getThankYou']);
    // Route::get('/{lang}', ['as' => 'user.index', 'uses' => 'User\UserController@getIndex']);
    Route::get('/locale/{lang}', ['as' => 'user.change.lang', 'uses' => 'User\UserController@changeLang']);

    Route::get('/{lang}/districts/{city_id}', ['as' => 'city.districts', 'uses' => 'User\UserController@getDistricts']);

    Route::get('/country/{country_id}', ['as' => 'country.change', 'uses' => 'User\UserController@changeCountry']);
    Route::get('/{lang}/cities', ['as' => 'get.cities', 'uses' => 'User\UserController@GetCities']);
    Route::get('/update_images_path', ['as' => 'update_images_path', 'uses' => 'User\UserController@update_images_path']);

    // Route::get('/{lang}/ads/search', ['as' => 'user.search.ads', 'uses' => 'User\UserController@search']);
    Route::get('/{lang}/ads/city/{city_id}', ['as' => 'user.city.ads', 'uses' => 'User\UserController@getCityAds']);
    // Route::get('/{lang}/ads/district/{district_id}', ['as' => 'user.district.ads', 'uses' => 'User\UserController@getDistrictAds']);
    // Route::get('/{lang}/projects/search', ['as' => 'user.search.projects', 'uses' => 'User\UserController@getProjects']);
    // Route::get('/{lang}/aboutus', ['as' => 'user.aboutus', 'uses' => 'User\UserController@getAboutUs']);
    Route::get('/{lang}/terms', ['as' => 'user.terms', 'uses' => 'User\UserController@getTerms']);
    Route::get('/{lang}/project/{id}/{project_title}', ['as' => 'user.project.get', 'uses' => 'User\UserController@getSingleProject']);
    Route::get('/project/share/{provider}/{id}', ['as' => 'user.project.share', 'uses' => 'User\UserController@shareProject']);
    Route::get('/{lang}/ad/{id}/{ad_name}', ['as' => 'user.ad.get', 'uses' => 'User\UserController@getSingleAd'])->where('ad_name', '(.*)');
    Route::get('/share/user/ad/{provider}/{id}', ['as' => 'user.ad.share', 'uses' => 'User\UserController@shareAd']);

    // Route::get('/{lang}/properties-for-sale', ['as' => 'user.sales', 'uses' => 'User\UserController@getSales']);
    // Route::get('/{lang}/properties-for-rent', ['as' => 'user.rent', 'uses' => 'User\UserController@getRents']);

    Route::post('/sendMail', ['as' => 'user.sendMail', 'uses' => 'User\UserController@sendEmail']);

    // Route::get('/user/logout', ['as' => 'user.logout', 'uses' => 'User\UserController@userLogout']);

    Route::get('/{lang}/forget', ['as' => 'user.forget.get', 'uses' => 'User\UserController@getForgetPassword']);
    Route::post('/forget', ['as' => 'user.forget.post', 'uses' => 'User\UserController@postForgetPassword']);
    Route::get('/{lang}/newpassword/{token}', ['as' => 'user.newpassword.get', 'uses' => 'User\UserController@getNewPassword']);
    Route::post('/newpassword/{token}', ['as' => 'user.newpassword.post', 'uses' => 'User\UserController@postNewPassword']);

    Route::group(['middleware' => 'user_not_auth'], function () {

        // // user
        // Route::get('/{lang}/user/login', ['as' => 'user.login.get', 'uses' => 'User\UserController@getUserLogin']);
        Route::post('/user/login/post', ['as' => 'user.login.post', 'uses' => 'User\UserController@postUserLogin']);
        // Route::get('/{lang}/user/register', ['as' => 'user.register.get', 'uses' => 'User\UserController@getUserRegister']);
        // Route::post('/user/register/post', ['as' => 'user.register.post', 'uses' => 'User\UserController@postUserRegister']);

        Route::get('/redirect/{provider}', ['as' => 'user.social.redirect', 'uses' => 'User\UserController@redirectToProvider']);
        Route::get('/callback/{provider}', ['as' => 'user.social.callback', 'uses' => 'User\UserController@handleProviderCallback']);

        // company
        // Route::get('/{lang}/company/register', ['as' => 'company.register.get', 'uses' => 'User\UserController@getCompanyRegister']);
        // Route::post('/company/register/post', ['as' => 'company.register.post', 'uses' => 'User\UserController@postCompanyRegister']);
    });

    Route::group(['middleware' => 'company_user_auth'], function () {
        Route::get('/{lang}/user/favourite/{id}', ['as' => 'user.favourite', 'uses' => 'User\UserController@favouriteAd']);
        Route::get('/user/addCompare/{id}', ['as' => 'user.add.compare', 'uses' => 'User\UserController@addCompare']);
        Route::get('/user/delete/compare/{id}', ['as' => 'user.compare.delete', 'uses' => 'User\UserController@deleteCompare']);
        Route::get('/{lang}/user/ads/{id}', ['as' => 'user.ads.get', 'uses' => 'User\UserController@getUserAds']);
        Route::post('/project/sendMail/{id}', ['as' => 'user.project.sendMail', 'uses' => 'User\UserController@sendMailToProject']);

        Route::get('/ad/change/status/{id}', ['as' => 'user.change.status', 'uses' => 'User\UserController@changeStatus']);
    });

    Route::group(['middleware' => 'company_user_agent_auth'], function () {
        Route::get('/ad/image/delete/{image_id}', ['as' => 'user.delete.image', 'uses' => 'User\UserController@deleteImage']);
    });

    Route::group(['middleware' => 'user_auth'], function () {
        // user
        // Route::get('/{lang}/user/ad/create', ['as' => 'user.ad.create', 'uses' => 'User\UserController@AdCreateGet']);
        Route::post('/user/ad/create/post', ['as' => 'user.ad.create.post', 'uses' => 'User\UserController@AdCreatePost']);

        Route::get('/ad/activate/{id}', ['as' => 'user.ad.activate', 'uses' => 'User\UserController@activateAd']);
        Route::get('/ad/deactivate/{id}', ['as' => 'user.ad.deactivate', 'uses' => 'User\UserController@deactivteAd']);

        Route::post('/user/report/post/{id}', ['as' => 'user.report.post', 'uses' => 'User\UserController@postReport']);

        Route::get('/{lang}/user/saved', ['as' => 'user.get.saved', 'uses' => 'User\UserController@getUserSaved']);

        Route::get('/{lang}/user/history', ['as' => 'user.history', 'uses' => 'User\UserController@getHistory']);

        Route::get('/{lang}/user/comparing', ['as' => 'user.my.comparing', 'uses' => 'User\UserController@getComparing']);

        Route::get('/{lang}/myads', ['as' => 'user.my.ads', 'uses' => 'User\UserController@getMyAds']);
        Route::get('/{lang}/expired', ['as' => 'user.my.expired', 'uses' => 'User\UserController@getMyExpired']);

        Route::get('/{lang}/my/ad/edit/{id}', ['as' => 'user.ad.edit', 'uses' => 'User\UserController@getEditAd']);
        Route::post('/ad/edit/post/{id}', ['as' => 'user.ad.edit.post', 'uses' => 'User\UserController@postEditAd']);

        Route::post('/user/ad/message/{id}', ['as' => 'user.post.chatroom', 'uses' => 'User\UserController@createChatRoom']);
        Route::get('/{lang}/user/inbox', ['as' => 'user.my.inbox', 'uses' => 'User\UserController@getInbox']);
        Route::get('/{lang}/user/room/{id}', ['as' => 'user.chatroom', 'uses' => 'User\UserController@getChatRoom']);
        Route::post('/user/message/post/{room_id}', ['as' => 'user.post.message', 'uses' => 'User\UserController@postMessageToRoom']);

        Route::get('/{lang}/user/editProfile', ['as' => 'user.profile.get', 'uses' => 'User\UserController@getProfile']);
        Route::post('/user/editProfile', ['as' => 'user.profile.post', 'uses' => 'User\UserController@postProfile']);

        Route::post('/user/assign/phone', ['as' => 'user.assign.phone', 'uses' => 'User\UserController@assignPhone']);
    });

    Route::group(['middleware' => 'company_agent_auth'], function () {
        Route::get('/{lang}/company/ad/create/', ['as' => 'company.ad.create.get', 'uses' => 'Company\CompanyController@getCreateAd']);
        Route::post('/company/ad/create/post', ['as' => 'company.ad.create.post', 'uses' => 'Company\CompanyController@postAd']);
        Route::get('/{lang}/company/my/ad/edit/{id}', ['as' => 'company.ad.edit', 'uses' => 'Company\CompanyController@getEditAd']);
        Route::post('/copmany/my/ad/edit/post/{id}', ['as' => 'company.ad.edit.post', 'uses' => 'Company\CompanyController@postEditAd']);
    });

    Route::group(['middleware' => 'company_auth'], function () {
        Route::get('/{lang}/company/dashboard', ['as' => 'company.dashboard', 'uses' => 'Company\CompanyController@getDashboard']);
        Route::post('/company/changePassword', ['as' => 'company.changepassword', 'uses' => 'Company\CompanyController@changePassword']);
        Route::post('/company/agent/add', ['as' => 'company.agent.create.post', 'uses' => 'Company\CompanyController@postAgent']);
        Route::post('/company/agent/edit/{id}', ['as' => 'company.agent.edit.post', 'uses' => 'Company\CompanyController@editAgent']);
        Route::get('/company/agent/delete/{id}', ['as' => 'company.agent.delete', 'uses' => 'Company\CompanyController@deleteAgent']);
        Route::get('/{lang}/company/agent/{id}', ['as' => 'company.agent.ads.get', 'uses' => 'Company\CompanyController@getAgentAds']);
        Route::get('/company/ad/change/{id}', ['as' => 'company.change.status', 'uses' => 'Company\CompanyController@changeStatus']);
        Route::get('/company/remove/assign/{id}', ['as' => 'company.remove.assign', 'uses' => 'Company\CompanyController@deassignAd']);

        Route::get('/{lang}/company/editProfile', ['as' => 'company.profile.get', 'uses' => 'Company\CompanyController@getProfile']);
        Route::post('/company/editProfile', ['as' => 'company.profile.post', 'uses' => 'Company\CompanyController@postProfile']);

        Route::get('/{lang}/company/inbox', ['as' => 'company.my.inbox', 'uses' => 'Company\CompanyController@getInbox']);
        Route::get('/{lang}/company/room/{id}', ['as' => 'company.chatroom', 'uses' => 'Company\CompanyController@getChatRoom']);
        Route::post('/company/message/post/{room_id}', ['as' => 'company.post.message', 'uses' => 'Company\CompanyController@postMessageToRoom']);
        Route::post('/company/ad/assign/{id}', ['as' => 'company.ad.assign', 'uses' => 'Company\CompanyController@Assign_add']);
        
        Route::post('/company/ad/repeat/{id}', ['as' => 'company.ad.repeat', 'uses' => 'Company\CompanyController@Repeat_add']);
        Route::post('/company/ad/repeat_all', ['as' => 'company.ad.repeat_all', 'uses' => 'Company\CompanyController@Repeat_add_all']);
        Route::post('/company/ad/remove_repeat/{id}', ['as' => 'company.ad.remove_repeat', 'uses' => 'Company\CompanyController@Repeat_remove']);
        
        Route::post('/company/ad/special/{id}', ['as' => 'company.ad.special', 'uses' => 'Company\CompanyController@Special_add']);
        Route::post('/company/ad/special_all', ['as' => 'company.ad.special_all', 'uses' => 'Company\CompanyController@Special_add_all']);
        Route::post('/company/ad/remove_special/{id}', ['as' => 'company.ad.remove_special', 'uses' => 'Company\CompanyController@Special_remove']);

        Route::get('/{lang}/copmany/package/subscribe/{id}', ['as' => 'company.package.subscribe', 'uses' => 'Company\CompanyController@package_subscribe']);
    });

    Route::group(['middleware' => 'agent_auth'], function () {
        Route::get('/{lang}/agent/myads', ['as' => 'agent.my.ads', 'uses' => 'Agent\AgentController@getMyAds']);
        Route::get('/{lang}/agent/inbox', ['as' => 'agent.my.inbox', 'uses' => 'Agent\AgentController@getInbox']);
        Route::get('/{lang}/agent/room/{id}', ['as' => 'agent.chatroom', 'uses' => 'Agent\AgentController@getChatRoom']);
        Route::post('/agent/message/post/{room_id}', ['as' => 'agent.post.message', 'uses' => 'Agent\AgentController@postMessageToRoom']);
    });

    // company
    Route::get('/{lang}/company/statistics', ['as' => 'company.stats', 'uses' => 'User\UserController@getCompanyStats']);

    Route::post('/project/sendMessage/{id}', ['as' => 'user.project.sendMessage', 'uses' => 'User\UserController@sendMessageToProject']);


    Route::get('/test/{offset}/{limit}', ['as' => 'user.test', 'uses' => 'User\UserController@test']);
    require 'packages/subscription.php';
});
