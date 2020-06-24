<?php
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin_not_auth']], function () {
        Route::get('/login', ['as' => 'admin.login.get', 'uses' => 'admin\auth\AdminController@getLogin']);
        Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'admin\auth\AdminController@postLogin']);
    });

    Route::group(['middleware' => ['admin_auth']], function () {
        // admin authentication
        Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'admin\auth\AdminController@logout']);
        Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'admin\auth\AdminController@getDashboard']);
        Route::get('/profile', ['as' => 'admin.get.profile', 'uses' => 'admin\auth\AdminController@getProfile']);
        Route::post('/profile', ['as' => 'admin.post.profile', 'uses' => 'admin\auth\AdminController@postProfile']);

        // categories
        Route::get('/categories', ['as' => 'admin.categories', 'uses' => 'admin\CategoryController@getAll']);
        Route::get('/categories/create', ['as' => 'admin.categories.create.get', 'uses' => 'admin\CategoryController@getCreate']);
        Route::post('/categories/create', ['as' => 'admin.categories.create.post', 'uses' => 'admin\CategoryController@postCreate']);
        Route::get('/categories/delete/{id}', ['as' => 'admin.categories.delete', 'uses' => 'admin\CategoryController@delete']);
        Route::get('/categories/{id}', ['as' => 'admin.categories.view', 'uses' => 'admin\CategoryController@getView']);
        Route::get('/categories/edit/{id}', ['as' => 'admin.categories.edit.get', 'uses' => 'admin\CategoryController@getEdit']);
        Route::post('/categories/edit/{id}', ['as' => 'admin.categories.edit.post', 'uses' => 'admin\CategoryController@postEdit']);
        Route::get('/categories/search/get', ['as' => 'admin.categories.search', 'uses' => 'admin\CategoryController@search']);

        // countries
        Route::get('/countries', ['as' => 'admin.countries', 'uses' => 'admin\CountryController@getAll']);
        Route::get('/countries/create', ['as' => 'admin.countries.create.get', 'uses' => 'admin\CountryController@getCreate']);
        Route::post('/countries/create', ['as' => 'admin.countries.create.post', 'uses' => 'admin\CountryController@postCreate']);
        Route::get('/countries/delete/{id}', ['as' => 'admin.countries.delete', 'uses' => 'admin\CountryController@delete']);
        Route::get('/countries/{id}', ['as' => 'admin.countries.view', 'uses' => 'admin\CountryController@getView']);
        Route::get('/countries/edit/{id}', ['as' => 'admin.countries.edit.get', 'uses' => 'admin\CountryController@getEdit']);
        Route::post('/countries/edit/{id}', ['as' => 'admin.countries.edit.post', 'uses' => 'admin\CountryController@postEdit']);
        Route::get('/countries/search/get', ['as' => 'admin.countries.search', 'uses' => 'admin\CountryController@search']);

        // cities
        Route::get('/cities/{country_id}', ['as' => 'admin.cities', 'uses' => 'admin\CityController@getAll']);
        Route::get('/cities/create/get', ['as' => 'admin.cities.create.get', 'uses' => 'admin\CityController@getCreate']);
        Route::post('/cities/create', ['as' => 'admin.cities.create.post', 'uses' => 'admin\CityController@postCreate']);
        Route::get('/cities/delete/{id}', ['as' => 'admin.cities.delete', 'uses' => 'admin\CityController@delete']);
        Route::get('/cities/view/{id}', ['as' => 'admin.cities.view', 'uses' => 'admin\CityController@getView']);
        Route::get('/cities/edit/{id}', ['as' => 'admin.cities.edit.get', 'uses' => 'admin\CityController@getEdit']);
        Route::post('/cities/edit/{id}', ['as' => 'admin.cities.edit.post', 'uses' => 'admin\CityController@postEdit']);
        Route::get('/cities/search/get', ['as' => 'admin.cities.search', 'uses' => 'admin\CityController@search']);
        // get cities of the country for ajax request
        Route::get('/cities/country/{country_id}', ['as' => 'admin.countries.cities.get', 'uses' => 'admin\CityController@getCitiesForCountry']);

        // industries
        Route::get('/industries', ['as' => 'admin.industries', 'uses' => 'admin\IndustryController@getAll']);
        Route::get('/industries/create/get', ['as' => 'admin.industries.create.get', 'uses' => 'admin\IndustryController@getCreate']);
        Route::post('/industries/create', ['as' => 'admin.industries.create.post', 'uses' => 'admin\IndustryController@postCreate']);
        Route::get('/industries/delete/{id}', ['as' => 'admin.industries.delete', 'uses' => 'admin\IndustryController@delete']);
        Route::get('/industries/{id}', ['as' => 'admin.industries.view', 'uses' => 'admin\IndustryController@getView']);
        Route::get('/industries/edit/{id}', ['as' => 'admin.industries.edit.get', 'uses' => 'admin\IndustryController@getEdit']);
        Route::post('/industries/edit/{id}', ['as' => 'admin.industries.edit.post', 'uses' => 'admin\IndustryController@postEdit']);
        Route::get('/industries/search/get', ['as' => 'admin.industries.search', 'uses' => 'admin\IndustryController@search']);

        // nationalities
        Route::get('/nationalities', ['as' => 'admin.nationalities', 'uses' => 'admin\NationalityController@getAll']);
        Route::get('/nationalities/create/get', ['as' => 'admin.nationalities.create.get', 'uses' => 'admin\NationalityController@getCreate']);
        Route::post('/nationalities/create', ['as' => 'admin.nationalities.create.post', 'uses' => 'admin\NationalityController@postCreate']);
        Route::get('/nationalities/delete/{id}', ['as' => 'admin.nationalities.delete', 'uses' => 'admin\NationalityController@delete']);
        Route::get('/nationalities/{id}', ['as' => 'admin.nationalities.view', 'uses' => 'admin\NationalityController@getView']);
        Route::get('/nationalities/edit/{id}', ['as' => 'admin.nationalities.edit.get', 'uses' => 'admin\NationalityController@getEdit']);
        Route::post('/nationalities/edit/{id}', ['as' => 'admin.nationalities.edit.post', 'uses' => 'admin\NationalityController@postEdit']);
        Route::get('/nationalities/search/get', ['as' => 'admin.nationalities.search', 'uses' => 'admin\NationalityController@search']);

        // joblevels
        Route::get('/joblevels', ['as' => 'admin.joblevels', 'uses' => 'admin\JobLevelController@getAll']);
        Route::get('/joblevels/create/get', ['as' => 'admin.joblevels.create.get', 'uses' => 'admin\JobLevelController@getCreate']);
        Route::post('/joblevels/create', ['as' => 'admin.joblevels.create.post', 'uses' => 'admin\JobLevelController@postCreate']);
        Route::get('/joblevels/delete/{id}', ['as' => 'admin.joblevels.delete', 'uses' => 'admin\JobLevelController@delete']);
        Route::get('/joblevels/{id}', ['as' => 'admin.joblevels.view', 'uses' => 'admin\JobLevelController@getView']);
        Route::get('/joblevels/edit/{id}', ['as' => 'admin.joblevels.edit.get', 'uses' => 'admin\JobLevelController@getEdit']);
        Route::post('/joblevels/edit/{id}', ['as' => 'admin.joblevels.edit.post', 'uses' => 'admin\JobLevelController@postEdit']);
        Route::get('/joblevels/search/get', ['as' => 'admin.joblevels.search', 'uses' => 'admin\JobLevelController@search']);

        // jobTypes
        Route::get('/jobtypes', ['as' => 'admin.jobtypes', 'uses' => 'admin\JobTypeController@getAll']);
        Route::get('/jobtypes/create/get', ['as' => 'admin.jobtypes.create.get', 'uses' => 'admin\JobTypeController@getCreate']);
        Route::post('/jobtypes/create', ['as' => 'admin.jobtypes.create.post', 'uses' => 'admin\JobTypeController@postCreate']);
        Route::get('/jobtypes/delete/{id}', ['as' => 'admin.jobtypes.delete', 'uses' => 'admin\JobTypeController@delete']);
        Route::get('/jobtypes/{id}', ['as' => 'admin.jobtypes.view', 'uses' => 'admin\JobTypeController@getView']);
        Route::get('/jobtypes/edit/{id}', ['as' => 'admin.jobtypes.edit.get', 'uses' => 'admin\JobTypeController@getEdit']);
        Route::post('/jobtypes/edit/{id}', ['as' => 'admin.jobtypes.edit.post', 'uses' => 'admin\JobTypeController@postEdit']);
        Route::get('/jobtypes/search/get', ['as' => 'admin.jobtypes.search', 'uses' => 'admin\JobTypeController@search']);

        // sizes
        Route::get('/sizes', ['as' => 'admin.sizes', 'uses' => 'admin\SizeController@getAll']);
        Route::get('/sizes/create/get', ['as' => 'admin.sizes.create.get', 'uses' => 'admin\SizeController@getCreate']);
        Route::post('/sizes/create', ['as' => 'admin.sizes.create.post', 'uses' => 'admin\SizeController@postCreate']);
        Route::get('/sizes/delete/{id}', ['as' => 'admin.sizes.delete', 'uses' => 'admin\SizeController@delete']);
        Route::get('/sizes/{id}', ['as' => 'admin.sizes.view', 'uses' => 'admin\SizeController@getView']);
        Route::get('/sizes/edit/{id}', ['as' => 'admin.sizes.edit.get', 'uses' => 'admin\SizeController@getEdit']);
        Route::post('/sizes/edit/{id}', ['as' => 'admin.sizes.edit.post', 'uses' => 'admin\SizeController@postEdit']);
        Route::get('/sizes/search/get', ['as' => 'admin.sizes.search', 'uses' => 'admin\SizeController@search']);

        // packages
        Route::get('/packages', ['as' => 'admin.packages', 'uses' => 'admin\PackageController@getAll']);
        // Route::get('/packages/create/get', ['as' => 'admin.packages.create.get', 'uses' => 'admin\PackageController@getCreate']);
        // Route::post('/packages/create', ['as' => 'admin.packages.create.post', 'uses' => 'admin\PackageController@postCreate']);
        // Route::get('/packages/delete/{id}', ['as' => 'admin.packages.delete', 'uses' => 'admin\PackageController@delete']);
        Route::get('/packages/{id}', ['as' => 'admin.packages.view', 'uses' => 'admin\PackageController@getView']);
        Route::get('/packages/edit/{id}', ['as' => 'admin.packages.edit.get', 'uses' => 'admin\PackageController@getEdit']);
        Route::post('/packages/edit/{id}', ['as' => 'admin.packages.edit.post', 'uses' => 'admin\PackageController@postEdit']);
        // Route::get('/packages/search/get', ['as' => 'admin.packages.search', 'uses' => 'admin\PackageController@search']);

        // users
        Route::get('/users', ['as' => 'admin.users', 'uses' => 'admin\UserController@getAll']);
        Route::get('/users/create/get', ['as' => 'admin.users.create.get', 'uses' => 'admin\UserController@getCreate']);
        Route::post('/users/create', ['as' => 'admin.users.create.post', 'uses' => 'admin\UserController@postCreate']);
        Route::get('/users/suspend/{id}', ['as' => 'admin.users.suspend', 'uses' => 'admin\UserController@suspend']);
        Route::get('/users/{id}', ['as' => 'admin.users.view', 'uses' => 'admin\UserController@getView']);
        Route::get('/users/edit/{id}', ['as' => 'admin.users.edit.get', 'uses' => 'admin\UserController@getEdit']);
        Route::post('/users/edit/{id}', ['as' => 'admin.users.edit.post', 'uses' => 'admin\UserController@postEdit']);
        Route::get('/users/search/get', ['as' => 'admin.users.search', 'uses' => 'admin\UserController@search']);
        Route::get('/users/export/get', ['as' => 'admin.users.export', 'uses' => 'admin\UserController@export']);
        Route::post('/users/import/post', ['as' => 'admin.users.import.post', 'uses' => 'admin\UserController@import']);

        //user experiences
        Route::get('/experiences/create/get/{user_id}', ['as' => 'admin.experiences.create.get', 'uses' => 'admin\WorkExperienceController@getCreate']);
        Route::post('/experiences/create/{user_id}', ['as' => 'admin.experiences.create.post', 'uses' => 'admin\WorkExperienceController@postCreate']);
        Route::get('/experiences/delete/{id}', ['as' => 'admin.experiences.delete', 'uses' => 'admin\WorkExperienceController@delete']);
        Route::get('/experiences/{id}', ['as' => 'admin.experiences.view', 'uses' => 'admin\WorkExperienceController@getView']);
        Route::get('/experiences/edit/{id}', ['as' => 'admin.experiences.edit.get', 'uses' => 'admin\WorkExperienceController@getEdit']);
        Route::post('/experiences/edit/{id}', ['as' => 'admin.experiences.edit.post', 'uses' => 'admin\WorkExperienceController@postEdit']);

        //user skills
        Route::post('/skills/create/{user_id}', ['as' => 'admin.skills.create.post', 'uses' => 'admin\SkillController@postCreate']);

        //educations
        Route::get('/educations/create/get/{user_id}', ['as' => 'admin.educations.create.get', 'uses' => 'admin\EducationController@getCreate']);
        Route::post('/educations/create/{user_id}', ['as' => 'admin.educations.create.post', 'uses' => 'admin\EducationController@postCreate']);
        Route::get('/educations/delete/{id}', ['as' => 'admin.educations.delete', 'uses' => 'admin\EducationController@delete']);
        Route::get('/educations/{id}', ['as' => 'admin.educations.view', 'uses' => 'admin\EducationController@getView']);
        Route::get('/educations/edit/{id}', ['as' => 'admin.educations.edit.get', 'uses' => 'admin\EducationController@getEdit']);
        Route::post('/educations/edit/{id}', ['as' => 'admin.educations.edit.post', 'uses' => 'admin\EducationController@postEdit']);

        //targetJobs
        Route::get('/targets/create/get/{user_id}', ['as' => 'admin.targets.create.get', 'uses' => 'admin\TargetJobController@getCreate']);
        Route::post('/targets/create/{user_id}', ['as' => 'admin.targets.create.post', 'uses' => 'admin\TargetJobController@postCreate']);
        Route::get('/targets/delete/{id}', ['as' => 'admin.targets.delete', 'uses' => 'admin\TargetJobController@delete']);
        Route::get('/targets/{id}', ['as' => 'admin.targets.view', 'uses' => 'admin\TargetJobController@getView']);
        Route::get('/targets/edit/{id}', ['as' => 'admin.targets.edit.get', 'uses' => 'admin\TargetJobController@getEdit']);
        Route::post('/targets/edit/{id}', ['as' => 'admin.targets.edit.post', 'uses' => 'admin\TargetJobController@postEdit']);

        //certificates
        Route::get('/certificates/create/get/{user_id}', ['as' => 'admin.certificates.create.get', 'uses' => 'admin\CertificateController@getCreate']);
        Route::post('/certificates/create/{user_id}', ['as' => 'admin.certificates.create.post', 'uses' => 'admin\CertificateController@postCreate']);
        Route::get('/certificates/delete/{id}', ['as' => 'admin.certificates.delete', 'uses' => 'admin\CertificateController@delete']);
        Route::get('/certificates/{id}', ['as' => 'admin.certificates.view', 'uses' => 'admin\CertificateController@getView']);
        Route::get('/certificates/edit/{id}', ['as' => 'admin.certificates.edit.get', 'uses' => 'admin\CertificateController@getEdit']);
        Route::post('/certificates/edit/{id}', ['as' => 'admin.certificates.edit.post', 'uses' => 'admin\CertificateController@postEdit']);

        //langauges
        Route::get('/languages/create/get/{user_id}', ['as' => 'admin.languages.create.get', 'uses' => 'admin\LanguageController@getCreate']);
        Route::post('/languages/create/{user_id}', ['as' => 'admin.languages.create.post', 'uses' => 'admin\LanguageController@postCreate']);
        Route::get('/languages/delete/{id}', ['as' => 'admin.languages.delete', 'uses' => 'admin\LanguageController@delete']);
        Route::get('/languages/{id}', ['as' => 'admin.languages.view', 'uses' => 'admin\LanguageController@getView']);
        Route::get('/languages/edit/{id}', ['as' => 'admin.languages.edit.get', 'uses' => 'admin\LanguageController@getEdit']);
        Route::post('/languages/edit/{id}', ['as' => 'admin.languages.edit.post', 'uses' => 'admin\LanguageController@postEdit']);

        //companies
        Route::get('/companies', ['as' => 'admin.companies', 'uses' => 'admin\CompanyController@getAll']);
        Route::get('/companies/create/get', ['as' => 'admin.companies.create.get', 'uses' => 'admin\CompanyController@getCreate']);
        Route::post('/companies/create', ['as' => 'admin.companies.create.post', 'uses' => 'admin\CompanyController@postCreate']);
        Route::get('/companies/suspend/{id}', ['as' => 'admin.companies.suspend', 'uses' => 'admin\CompanyController@suspend']);
        Route::get('/companies/approve/{id}', ['as' => 'admin.companies.approve', 'uses' => 'admin\CompanyController@approve']);
        Route::get('/companies/{id}', ['as' => 'admin.companies.view', 'uses' => 'admin\CompanyController@getView']);
        Route::get('/companies/edit/{id}', ['as' => 'admin.companies.edit.get', 'uses' => 'admin\CompanyController@getEdit']);
        Route::post('/companies/edit/{id}', ['as' => 'admin.companies.edit.post', 'uses' => 'admin\CompanyController@postEdit']);
        Route::get('/companies/search/get', ['as' => 'admin.companies.search', 'uses' => 'admin\CompanyController@search']);
        Route::get('/companies/export/get', ['as' => 'admin.companies.export', 'uses' => 'admin\CompanyController@export']);
        Route::post('/companies/import/post', ['as' => 'admin.companies.import.post', 'uses' => 'admin\CompanyController@import']);

        //jobs
        Route::get('/jobs', ['as' => 'admin.jobs', 'uses' => 'admin\JobController@getAll']);
        Route::get('/jobs/create/get', ['as' => 'admin.jobs.create.get', 'uses' => 'admin\JobController@getCreate']);
        Route::post('/jobs/create', ['as' => 'admin.jobs.create.post', 'uses' => 'admin\JobController@postCreate']);
        Route::get('/jobs/delete/{id}', ['as' => 'admin.jobs.delete', 'uses' => 'admin\JobController@delete']);
        Route::get('/jobs/{id}', ['as' => 'admin.jobs.view', 'uses' => 'admin\JobController@getView']);
        Route::get('/jobs/edit/{id}', ['as' => 'admin.jobs.edit.get', 'uses' => 'admin\JobController@getEdit']);
        Route::post('/jobs/edit/{id}', ['as' => 'admin.jobs.edit.post', 'uses' => 'admin\JobController@postEdit']);
        Route::get('/jobs/search/get', ['as' => 'admin.jobs.search', 'uses' => 'admin\JobController@search']);
        Route::get('/jobs/export/get', ['as' => 'admin.jobs.export', 'uses' => 'admin\JobController@export']);
        Route::post('/jobs/import/post', ['as' => 'admin.jobs.import.post', 'uses' => 'admin\JobController@import']);
        Route::get('/jobs/change/{id}', ['as' => 'admin.jobs.change', 'uses' => 'admin\JobController@changeJobStatus']);

        // posts
        Route::get('/posts', ['as' => 'admin.posts', 'uses' => 'admin\PostController@getAll']);
        Route::get('/posts/create/get', ['as' => 'admin.posts.create.get', 'uses' => 'admin\PostController@getCreate']);
        Route::post('/posts/create', ['as' => 'admin.posts.create.post', 'uses' => 'admin\PostController@postCreate']);
        Route::get('/posts/delete/{id}', ['as' => 'admin.posts.delete', 'uses' => 'admin\PostController@delete']);
        Route::get('/posts/{id}', ['as' => 'admin.posts.view', 'uses' => 'admin\PostController@getView']);
        Route::get('/posts/edit/{id}', ['as' => 'admin.posts.edit.get', 'uses' => 'admin\PostController@getEdit']);
        Route::post('/posts/edit/{id}', ['as' => 'admin.posts.edit.post', 'uses' => 'admin\PostController@postEdit']);
        Route::get('/posts/search/get', ['as' => 'admin.posts.search', 'uses' => 'admin\PostController@search']);

        // contents
        Route::get('/contents', ['as' => 'admin.contents', 'uses' => 'admin\ContentController@getAll']);
        Route::get('/contents/{id}', ['as' => 'admin.contents.view', 'uses' => 'admin\ContentController@getView']);
        Route::get('/contents/edit/{id}', ['as' => 'admin.contents.edit.get', 'uses' => 'admin\ContentController@getEdit']);
        Route::post('/contents/edit/{id}', ['as' => 'admin.contents.edit.post', 'uses' => 'admin\ContentController@postEdit']);

        // feedbacks
        Route::get('/feedbacks', ['as' => 'admin.feedbacks', 'uses' => 'admin\FeedbackController@getAll']);
        Route::get('/feedbacks/create/get', ['as' => 'admin.feedbacks.create.get', 'uses' => 'admin\FeedbackController@getCreate']);
        Route::post('/feedbacks/create', ['as' => 'admin.feedbacks.create.post', 'uses' => 'admin\FeedbackController@postCreate']);
        Route::get('/feedbacks/delete/{id}', ['as' => 'admin.feedbacks.delete', 'uses' => 'admin\FeedbackController@delete']);
        Route::get('/feedbacks/{id}', ['as' => 'admin.feedbacks.view', 'uses' => 'admin\FeedbackController@getView']);
        Route::get('/feedbacks/edit/{id}', ['as' => 'admin.feedbacks.edit.get', 'uses' => 'admin\FeedbackController@getEdit']);
        Route::post('/feedbacks/edit/{id}', ['as' => 'admin.feedbacks.edit.post', 'uses' => 'admin\FeedbackController@postEdit']);
        Route::get('/feedbacks/search/get', ['as' => 'admin.feedbacks.search', 'uses' => 'admin\FeedbackController@search']);
        Route::get('/feedbacks/approve/{id}', ['as' => 'admin.feedbacks.approve', 'uses' => 'admin\FeedbackController@approve']);

        // Ads
        Route::get('/ads', ['as' => 'admin.ads', 'uses' => 'admin\AdController@getAll']);
        Route::get('/ads/create/get', ['as' => 'admin.ads.create.get', 'uses' => 'admin\AdController@getCreate']);
        Route::post('/ads/create', ['as' => 'admin.ads.create.post', 'uses' => 'admin\AdController@postCreate']);
        Route::get('/ads/delete/{id}', ['as' => 'admin.ads.delete', 'uses' => 'admin\AdController@delete']);
        Route::get('/ads/{id}', ['as' => 'admin.ads.view', 'uses' => 'admin\AdController@getView']);
        Route::get('/ads/edit/{id}', ['as' => 'admin.ads.edit.get', 'uses' => 'admin\AdController@getEdit']);
        Route::post('/ads/edit/{id}', ['as' => 'admin.ads.edit.post', 'uses' => 'admin\AdController@postEdit']);
        Route::get('/ads/search/get', ['as' => 'admin.ads.search', 'uses' => 'admin\AdController@search']);
        Route::get('/ads/approve/{id}', ['as' => 'admin.ads.approve', 'uses' => 'admin\AdController@approve']);

        // job description
        Route::get('/descriptions', ['as' => 'admin.descriptions', 'uses' => 'admin\DescriptionController@getAll']);
        Route::get('/descriptions/create/get', ['as' => 'admin.descriptions.create.get', 'uses' => 'admin\DescriptionController@getCreate']);
        Route::post('/descriptions/create', ['as' => 'admin.descriptions.create.post', 'uses' => 'admin\DescriptionController@postCreate']);
        Route::get('/descriptions/delete/{id}', ['as' => 'admin.descriptions.delete', 'uses' => 'admin\DescriptionController@delete']);
        Route::get('/descriptions/{id}', ['as' => 'admin.descriptions.view', 'uses' => 'admin\DescriptionController@getView']);
        Route::get('/descriptions/edit/{id}', ['as' => 'admin.descriptions.edit.get', 'uses' => 'admin\DescriptionController@getEdit']);
        Route::post('/descriptions/edit/{id}', ['as' => 'admin.descriptions.edit.post', 'uses' => 'admin\DescriptionController@postEdit']);
        Route::get('/descriptions/search/get', ['as' => 'admin.descriptions.search', 'uses' => 'admin\DescriptionController@search']);

        // visitors
        Route::get('/visitors', ['as' => 'admin.visitors', 'uses' => 'admin\VisitorController@getAll']);
        Route::get('/visitors/clear', ['as' => 'admin.visitors.clear', 'uses' => 'admin\VisitorController@clear']);
        Route::get('/visitors/export/get', ['as' => 'admin.visitors.export', 'uses' => 'admin\VisitorController@export']);

        // Emails Campaign
        Route::get('/emails', ['as' => 'admin.emails.get', 'uses' => 'admin\EmailController@getSendEmails']);
        Route::post('/import/emails', ['as' => 'admin.emails.import', 'uses' => 'admin\EmailController@postSendEmails']);

        // subscriptions
        Route::get('/subscriptions', ['as' => 'admin.subscriptions.get', 'uses' => 'admin\SubscriptionController@get']);
        Route::get('/subscriptions/export', ['as' => 'admin.subscriptions.export', 'uses' => 'admin\SubscriptionController@export']);
    });
});
