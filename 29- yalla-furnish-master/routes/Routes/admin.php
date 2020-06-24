<?php
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin_not_auth'], function () {
        Route::get('/login', ['as' => 'admin.login.get', 'uses' => 'admin\AdminController@getLogin']);
        Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'admin\AdminController@postLogin']);
    });

    Route::group(['middleware' => 'admin_auth'], function () {

        // set fcm token
        Route::post('/setFCM', ['as' => 'admin.setFcm', 'uses' => 'admin\TokenController@setFCMToken']);

        Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'admin\AdminController@getDashboard']);

        // Notification
        Route::get('/notification/{id}', ['as' => 'admin.read.notification', 'uses' => 'admin\NotificationController@getNotification']);

        // sub AdminController
        Route::get('/subadmins', ['as' => 'admin.subadmins.get', 'uses' => 'admin\AdminController@getAllAdmins']);
        Route::get('/subadmin/{id}', ['as' => 'admin.subadmin.view', 'uses' => 'admin\AdminController@getSingleAdmin']);
        Route::get('/subadmin', ['as' => 'admin.subadmin.create.get', 'uses' => 'admin\AdminController@getCreate']);
        Route::post('/subadmin/post', ['as' => 'admin.subadmin.create.post', 'uses' => 'admin\AdminController@postCreate']);
        Route::get('/subadmin/edit/{id}', ['as' => 'admin.subadmin.edit.get', 'uses' => 'admin\AdminController@getEdit']);
        Route::post('/subadmin/edit/{id}', ['as' => 'admin.subadmin.edit.post', 'uses' => 'admin\AdminController@postEdit']);

        // users
        Route::get('/users', ['as' => 'admin.users.get', 'uses' => 'admin\UserController@getAllUsers']);
        Route::get('/user/{id}', ['as' => 'admin.user.view', 'uses' => 'admin\UserController@getSingleUser']);
        Route::get('/user/change/contentcreator/{id}', ['as' => 'admin.user.contentCreator', 'uses' => 'admin\UserController@becomeContentCreator']);

        // fileManager
        Route::get("/uitilities",['as' => 'admin.uitilities.get', 'uses' => 'admin\FileManangerController@index']);
        Route::post("/uitilities/store",['as' => 'admin.uitilities.store', 'uses' => 'admin\FileManangerController@store']);
        Route::post("/uitilities/delete",['as' => 'admin.uitilities.deleted', 'uses' => 'admin\FileManangerController@delteImages']);

        // creators
        Route::get('/creators', ['as' => 'admin.creators.get', 'uses' => 'admin\UserController@getAllContentCreators']);

        // roles
        Route::get('/roles', ['as' => 'admin.roles.get', 'uses' => 'admin\RoleController@getAllRoles']);
        Route::get('/role', ['as' => 'admin.role.create.get', 'uses' => 'admin\RoleController@getCreate']);
        Route::post('/role/post', ['as' => 'admin.role.create.post', 'uses' => 'admin\RoleController@postCreate']);

        //products
        Route::get('/products', ['as' => 'admin.products.index', 'uses' => 'admin\ProductController@index']);
        Route::get('/products/{id}', ['as' => 'admin.products.view', 'uses' => 'admin\ProductController@show']);
        Route::get('/product', ['as' => 'admin.product.create.get', 'uses' => 'admin\ProductController@getCreate']);
        Route::post('/product/post', ['as' => 'admin.product.create.post', 'uses' => 'admin\ProductController@postCreate']);
        Route::get('/showroom/branches/{id}', ['as' => 'admin.branches.showroom.get', 'uses' => 'admin\ShowroomController@getBranches']);
        Route::get('/product/approve/{id}', ['as' => 'admin.product.approve', 'uses' => 'admin\ProductController@approveProduct']);
        Route::post('/product/dismiss/{id}', ['as' => 'admin.product.dismiss', 'uses' => 'admin\ProductController@dismissProduct']);
        Route::get('/product/edit/{id}', ['as' => 'admin.product.edit.get', 'uses' => 'admin\ProductController@getEdit']);
        Route::post('/product/edit/{id}', ['as' => 'admin.product.edit.post', 'uses' => 'admin\ProductController@postEdit']);
        Route::get('/product/remove/image/{id}/{product_id}', ['as' => 'product.remove.image', 'uses' => 'admin\ProductController@deleteImage']);
        Route::get('/product/delete/{id}', ['as' => 'admin.product.delete', 'uses' => 'admin\ProductController@delete']);

        //Admin Showrooms 
        Route::get('/showrooms', ['as' => 'admin.showrooms', 'uses' => 'admin\ShowroomController@all_showrooms']);
        Route::get('/showrooms_details/{id}', ['as' => 'admin.showroom.details', 'uses' => 'admin\ShowroomController@showroom_details']);
        Route::get('/add_showroom', ['as' => 'admin.create.showroom', 'uses' => 'admin\ShowroomController@create']);
        Route::post('/add_showroom', ['as' => 'admin.showroom.store', 'uses' => 'admin\ShowroomController@store']);
        Route::get('/edit_showroom/{id}', ['as' => 'admin.showroom.edit', 'uses' => 'admin\ShowroomController@edit_showroom']);
        Route::post('/update_showroom', ['as' => 'admin.showroom.update', 'uses' => 'admin\ShowroomController@update_showroom']);
        Route::get('/showroom/delete/{id}', ['as' => 'admin.showroom.delete', 'uses' => 'admin\ShowroomController@delete']);
        Route::get('/showroom/change/status/{id}', ['as' => 'admin.showroom.status.change', 'uses' => 'admin\ShowroomController@changeStatus']);
        Route::get('/showroom/change/approve/{id}', ['as' => 'admin.showroom.approve.change', 'uses' => 'admin\ShowroomController@changeApproval']);
        Route::post('/showroom/dismiss/{id}', ['as' => 'admin.showroom.dismiss', 'uses' => 'admin\ShowroomController@dismissShowroom']);

        // topics
        Route::get('/topics', ['as' => 'admin.topics.get', 'uses' => 'admin\TopicController@getAllTopics']);
        Route::get('/topic/{id}', ['as' => 'admin.topics.view', 'uses' => 'admin\TopicController@getSingleTopic']);
        Route::get('/topic', ['as' => 'admin.topic.create.get', 'uses' => 'admin\TopicController@create']);
        Route::post('/topic/post', ['as' => 'admin.topic.create.post', 'uses' => 'admin\TopicController@store']);
        Route::get('/topic/edit/{id}', ['as' => 'admin.topic.edit', 'uses' => 'admin\TopicController@edit']);
        Route::post('/topic/update', ['as' => 'admin.topic.update', 'uses' => 'admin\TopicController@update']);
        Route::get('/reomve/image', ['as' => 'remove.image', 'uses' => 'admin\TopicController@remove_image']);
        Route::get('/topic/delete/{id}', ['as' => 'admin.topic.delete', 'uses' => 'admin\TopicController@delete']);

        // frame materials
        Route::get('/materials', ['as' => 'admin.materials.get', 'uses' => 'admin\MaterialController@getAllMaterials']);
        Route::get('/material/{id}', ['as' => 'admin.materials.view', 'uses' => 'admin\MaterialController@getSingleMaterial']);
        Route::get('/material', ['as' => 'admin.materials.create.get', 'uses' => 'admin\MaterialController@create']);
        Route::post('/material/post', ['as' => 'admin.materials.create.post', 'uses' => 'admin\MaterialController@store']);
        Route::get('/material/delete/{id}', ['as' => 'admin.material.delete', 'uses' => 'admin\MaterialController@delete']);
        Route::get('/material/edit/{id}', ['as' => 'admin.materials.edit.get', 'uses' => 'admin\MaterialController@getEdit']);
        Route::post('/material/edit/{id}', ['as' => 'admin.materials.edit.post', 'uses' => 'admin\MaterialController@postEdit']);

        // categories
        Route::get('/categories', ['as' => 'admin.categories.get', 'uses' => 'admin\CategoryController@getAllCategories']);
        Route::get('/category/{id}', ['as' => 'admin.categories.view', 'uses' => 'admin\CategoryController@getSingleCategory']);
        Route::get('/category', ['as' => 'admin.category.create.get', 'uses' => 'admin\CategoryController@create']);
        Route::post('/category/post', ['as' => 'admin.category.create.post', 'uses' => 'admin\CategoryController@store']);
        Route::get('/category/delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'admin\CategoryController@delete']);
        Route::get('/category/edit/{id}', ['as' => 'admin.category.edit.get', 'uses' => 'admin\CategoryController@getEdit']);
        Route::post('/category/edit/{id}', ['as' => 'admin.category.edit.post', 'uses' => 'admin\CategoryController@postEdit']);

        // upholostries
        Route::get('/upholsteries', ['as' => 'admin.upholsteries.get', 'uses' => 'admin\UpholsteryController@getAllUpholsteries']);
        Route::get('/upholstery/{id}', ['as' => 'admin.upholsteries.view', 'uses' => 'admin\UpholsteryController@getSingleUpholstery']);
        Route::get('/upholstery', ['as' => 'admin.upholstery.create.get', 'uses' => 'admin\UpholsteryController@create']);
        Route::post('/upholstery/post', ['as' => 'admin.upholstery.create.post', 'uses' => 'admin\UpholsteryController@store']);
        Route::get('/upholstery/delete/{id}', ['as' => 'admin.upholstery.delete', 'uses' => 'admin\UpholsteryController@delete']);
        Route::get('/upholstery/edit/{id}', ['as' => 'admin.upholstery.edit.get', 'uses' => 'admin\UpholsteryController@getEdit']);
        Route::post('/upholstery/edit/{id}', ['as' => 'admin.upholstery.edit.post', 'uses' => 'admin\UpholsteryController@postEdit']);

        // styles
        Route::get('/styles', ['as' => 'admin.styles.get', 'uses' => 'admin\StyleController@getAllStyles']);
        Route::get('/style/{id}', ['as' => 'admin.styles.view', 'uses' => 'admin\StyleController@getSingleStyle']);
        Route::get('/style', ['as' => 'admin.styles.create.get', 'uses' => 'admin\StyleController@create']);
        Route::post('/style/post', ['as' => 'admin.styles.create.post', 'uses' => 'admin\StyleController@store']);
        Route::get('/style/delete/{id}', ['as' => 'admin.style.delete', 'uses' => 'admin\StyleController@delete']);
        Route::get('/style/edit/{id}', ['as' => 'admin.styles.edit.get', 'uses' => 'admin\StyleController@getEdit']);
        Route::post('/style/edit/{id}', ['as' => 'admin.styles.edit.post', 'uses' => 'admin\StyleController@postEdit']);

        // colors
        Route::get('/colors', ['as' => 'admin.colors.get', 'uses' => 'admin\ColorController@getAllColors']);
        Route::get('/color/{id}', ['as' => 'admin.colors.view', 'uses' => 'admin\ColorController@getSingleColor']);
        Route::get('/color', ['as' => 'admin.colors.create.get', 'uses' => 'admin\ColorController@create']);
        Route::post('/color/post', ['as' => 'admin.colors.create.post', 'uses' => 'admin\ColorController@store']);
        Route::get('/color/delete/{id}', ['as' => 'admin.color.delete', 'uses' => 'admin\ColorController@delete']);
        Route::get('/color/edit/{id}', ['as' => 'admin.colors.edit.get', 'uses' => 'admin\ColorController@getEdit']);
        Route::post('/color/edit/{id}', ['as' => 'admin.colors.edit.post', 'uses' => 'admin\ColorController@postEdit']);

        // colors
        Route::get('/malls', ['as' => 'admin.malls.get', 'uses' => 'admin\MallController@getAllMalls']);
        Route::get('/mall/{id}', ['as' => 'admin.malls.view', 'uses' => 'admin\MallController@getSingleMall']);
        Route::get('/mall', ['as' => 'admin.malls.create.get', 'uses' => 'admin\MallController@create']);
        Route::post('/mall/post', ['as' => 'admin.malls.create.post', 'uses' => 'admin\MallController@store']);
        // Route::get('/mall/delete/{id}', ['as' => 'admin.mall.delete', 'uses' => 'admin\MallController@delete']);
        Route::get('/mall/edit/{id}', ['as' => 'admin.malls.edit.get', 'uses' => 'admin\MallController@getEdit']);
        Route::post('/mall/edit/{id}', ['as' => 'admin.malls.edit.post', 'uses' => 'admin\MallController@postEdit']);

        //IDEA ROUTES
        Route::group(['as' => 'admin.idea'], function () {
            Route::get('/ideas', ['as' => '', 'uses' => 'admin\IdeaController@index']);
            Route::get('/ideas/{id}', ['as' => '.view', 'uses' => 'admin\IdeaController@show']);

            Route::get('/idea', ['as' => '.create.get', 'uses' => 'admin\IdeaController@create']);
            Route::post('/idea/post', ['as' => '.create.post', 'uses' => 'admin\IdeaController@store']);
            Route::get('/idea/delete/{id}', ['as' => '.delete', 'uses' => 'admin\IdeaController@delete']);
            Route::get('/idea/edit/{id}', ['as' => '.edit', 'uses' => 'admin\IdeaController@edit']);
            Route::post('/idea/update', ['as' => '.update', 'uses' => 'admin\IdeaController@update']);
            Route::get('/idea/change/status/{id}', ['as' => '.change.status', 'uses' => 'admin\IdeaController@changeStatus']);
            Route::post('/idea/dismiss/{id}', ['as' => '.dismiss', 'uses' => 'admin\IdeaController@dismissIdea']);
        });

        Route::group(['as' => 'admin.paragraphs'], function () {
            Route::post('/paragraph/post/{idea_id}', ['as' => '.create.post', 'uses' => 'admin\ParagraphController@store']);
            Route::get('/paragraph/delete/{id}', ['as' => '.delete', 'uses' => 'admin\ParagraphController@delete']);
            Route::post('/paragraph/update/{id}', ['as' => '.update', 'uses' => 'admin\ParagraphController@update']);
        });

        // countries
        Route::get('/countries', ['as' => 'admin.countries.get', 'uses' => 'admin\CountryController@getAllCountries']);
        Route::get('/country/{id}', ['as' => 'admin.countries.view', 'uses' => 'admin\CountryController@getSingleCountry']);
        Route::get('/country', ['as' => 'admin.countries.create.get', 'uses' => 'admin\CountryController@create']);
        Route::post('/country/post', ['as' => 'admin.countries.create.post', 'uses' => 'admin\CountryController@store']);
        Route::get('/country/delete/{id}', ['as' => 'admin.country.delete', 'uses' => 'admin\CountryController@delete']);
        Route::get('/country/edit/{id}', ['as' => 'admin.countries.edit.get', 'uses' => 'admin\CountryController@getEdit']);
        Route::post('/country/edit/{id}', ['as' => 'admin.countries.edit.post', 'uses' => 'admin\CountryController@postEdit']);

        // cities
        Route::get('/cities', ['as' => 'admin.cities.get', 'uses' => 'admin\CityController@getAllCities']);
        Route::get('/city/{id}', ['as' => 'admin.cities.view', 'uses' => 'admin\CityController@getSingleCity']);
        Route::get('/city', ['as' => 'admin.city.create.get', 'uses' => 'admin\CityController@create']);
        Route::post('/city/post', ['as' => 'admin.city.create.post', 'uses' => 'admin\CityController@store']);
        Route::get('/city/edit/{id}', ['as' => 'admin.city.edit.get', 'uses' => 'admin\CityController@getEdit']);
        Route::post('/city/edit/{id}', ['as' => 'admin.city.edit.post', 'uses' => 'admin\CityController@postEdit']);
        Route::get('/city/delete/{id}', ['as' => 'admin.city.delete', 'uses' => 'admin\CityController@delete']);

        // districts
        Route::get('/districts', ['as' => 'admin.districts.get', 'uses' => 'admin\DistrictController@getAllDistricts']);
        Route::get('/district/{id}', ['as' => 'admin.districts.view', 'uses' => 'admin\DistrictController@getSingleDistrict']);
        Route::get('/district', ['as' => 'admin.district.create.get', 'uses' => 'admin\DistrictController@create']);
        Route::post('/district/post', ['as' => 'admin.district.create.post', 'uses' => 'admin\DistrictController@store']);
        Route::get('/district/delete/{id}', ['as' => 'admin.district.delete', 'uses' => 'admin\DistrictController@delete']);
        Route::get('/district/edit/{id}', ['as' => 'admin.district.edit', 'uses' => 'admin\DistrictController@edit']);
        Route::post('/district/update', ['as' => 'admin.district.update', 'uses' => 'admin\DistrictController@update']);

        //BRANCHES ROUTES
        //IDEA ROUTES
        Route::group(['as' => 'admin.branches'], function () {
            Route::get('/branches', ['as' => '', 'uses' => 'admin\BranchController@index']);
            Route::get('/branches/{id}', ['as' => '.view', 'uses' => 'admin\BranchController@show']);
            Route::get('/branches/delete/{id}', ['as' => '.delete', 'uses' => 'admin\BranchController@delete']);
            Route::get('/branches/edit/{id}', ['as' => '.edit', 'uses' => 'admin\BranchController@edit']);
            Route::post('/branches/update/{id}', ['as' => '.update', 'uses' => 'admin\BranchController@update']);
        });

        // logout
        Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'admin\AdminController@logout']);
    });
});
