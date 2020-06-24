<?php

// test




Route::post('/users/import/delete', ['as' => 'delete.excel', 'uses' => 'admin\UserController@delete_import']);
Route::get('/users/import/delete/get', ['as' => 'delete.excel.get', 'uses' => 'admin\UserController@delete_import_get']);

Route::get('/language/{lang}', ['as' => 'user.localization', 'uses' => 'user\UserController@changeLang']);
Route::get('/search', ['as' => 'user.search', 'uses' => 'user\UserController@search']);
Route::get('/browse-jobs/{search?}', ['as' => 'user.browse', 'uses' => 'user\UserController@BrowseJobs']);

Route::get('/', ['as' => 'user.index', 'uses' => 'user\UserController@getIndex']);

Route::get('/getLatestJobs', ['as' => 'user.get.latest_jobs', 'uses' => 'user\UserController@getLatestJobs']);
Route::get('/jobseeker/{id}', ['as' => 'user.get', 'uses' => 'user\UserController@getUser']);

// Start New User Profile Routes
Route::get('/new-edit-profile', ['as' => 'user.new-edit-profile', 'uses' => 'user\UserController@editProfileInfo']);
// Start New User Profile Routes
Route::get('/new-edit-profile2', ['as' => 'user.new-edit-profile2', 'uses' => 'user\UserController@editProfileInfo2'])->middleware("user_auth");
Route::get('/new-edit-profile/exp', ['as' => 'user.new-edit-profile-exp', 'uses' => 'user\UserController@editProfileExp']);
Route::get('/new-edit-profile/job', ['as' => 'user.new-edit-profile-job', 'uses' => 'user\UserController@editProfileJob']);
Route::get('/new-edit-profile/edu', ['as' => 'user.new-edit-profile-edu', 'uses' => 'user\UserController@editProfileedu']);
Route::get('/new-edit-profile/skills', ['as' => 'user.new-edit-profile-skills', 'uses' => 'user\UserController@editProfileSkills']);
Route::get('/new-edit-profile/skills', ['as' => 'user.new-edit-profile-skills', 'uses' => 'user\UserController@editProfileSkills']);
Route::get('/new-edit-profile/certi', ['as' => 'user.new-edit-profile-certi', 'uses' => 'user\UserController@editProfileCerti']);
Route::get('/new-edit-profile/ref', ['as' => 'user.new-edit-profile-ref', 'uses' => 'user\UserController@editProfileRef']);
// End Start New User Profile Routes

Route::get('/companies/{search?}', ['as' => 'user.company.all', 'uses' => 'user\CompanyController@getAllCompanies']);

Route::get('/company/{slug}', ['as' => 'user.company.get', 'uses' => 'user\CompanyController@getCompany']);


Route::get('/company/jobs/{slug}', ['as' => 'user.company.get.jobs', 'uses' => 'user\CompanyController@getCompanyJobs']);
Route::get('/category/{slug}', ['as' => 'user.category.get.jobs', 'uses' => 'user\UserController@getCategoryJobs']);


Route::get('/job/{slug}', ['as' => 'user.get.job', 'uses' => 'user\JobController@getJob']);



Route::get('/contact-us', ['as' => 'user.contactus', 'uses' => 'user\UserController@getContactus']);
Route::post('/sendMail', ['as' => 'user.mail.post', 'uses' => 'user\UserController@sendMail']);
Route::get('/socialInvite', ['as' => 'user.facebook.invite', 'uses' => 'user\UserController@socialInvite']);
Route::post('/setFcm', ['as' => 'user.setFcm', 'uses' => 'user\auth\UserController@SetFcmToken']);
Route::get('/share/company/{id}/{provider}', ['as' => 'user.company.share', 'uses' => 'user\CompanyController@shareCompany']);
Route::get('/share/job/{id}/{provider}', ['as' => 'user.job.share', 'uses' => 'user\JobController@shareJob']);
Route::get('/aboutus', ['as' => 'user.aboutus', 'uses' => 'user\UserController@getAboutus']);
Route::get('/privacy', ['as' => 'user.privacy', 'uses' => 'user\UserController@getPrivacy']);
Route::get('/cv/{id}', ['as' => 'user.cv.get', 'uses' => 'user\UserController@getUserCv']);
Route::get('/video/{roomName}', ['as' => 'user.video.get', 'uses' => 'user\UserController@getVideo']);
Route::get('/expire', ['as' => 'session.expire', 'uses' => 'user\UserController@getExpirePage']);
Route::get('/not_started', ['as' => 'session.notstarted', 'uses' => 'user\UserController@getNotStartedSession']);
Route::get('/decline/interview/{id}', ['as' => 'user.decline.live', 'uses' => 'user\InterviewController@declineLiveInterview']);

Route::group(['middleware' => ['user_not_auth', 'company_not_auth', 'back_btn']], function () {
    Route::get('/register', ['as' => 'user.register.get', 'uses' => 'user\auth\UserController@getRegister']);
    Route::get('/login', ['as' => 'user.login.get', 'uses' => 'user\auth\UserController@getLogin']);
    Route::post('/login', ['as' => 'user.login.post', 'uses' => 'user\auth\UserController@postLogin']);

    Route::get('/forget', ['as' => 'user.forget.get', 'uses' => 'user\auth\UserController@getForgetPassword']);
    Route::post('/forget', ['as' => 'user.forget.post', 'uses' => 'user\auth\UserController@postForgetPassword']);
    Route::get('/newpassword/{token}', ['as' => 'user.newpassword.get', 'uses' => 'user\auth\UserController@getNewPassword']);
    Route::post('/newpassword/{token}', ['as' => 'user.newpassword.post', 'uses' => 'user\auth\UserController@postNewPassword']);

    Route::get('/verify/{code}', ['as' => 'user.verify', 'uses' => 'user\auth\UserController@verifyAccount']);
});

Route::group(['prefix' => 'user'], function () {
    // get cities of the country for ajax request
    Route::get('/cities/country/{country_id}', ['as' => 'user.countries.cities.get', 'uses' => 'user\CityController@getCitiesForCountry']);
    Route::get('/logout', ['as' => 'user.logout', 'uses' => 'user\auth\UserController@logout']);

    Route::group(['middleware' => ['user_not_auth', 'back_btn']], function () {
        Route::post('/register', ['as' => 'user.register.post', 'uses' => 'user\auth\UserController@postRegister']);

        Route::get('/redirect/{provider}', ['as' => 'user.social.redirect', 'uses' => 'user\auth\UserController@redirectToProvider']);
        Route::get('/callback/{provider}', ['as' => 'user.social.callback', 'uses' => 'user\auth\UserController@handleProviderCallback']);
    });

    Route::group(['middleware' => ['user_auth', 'back_btn']], function () {
        Route::get('/profile', ['as' => 'user.profile', 'uses' => 'user\auth\UserController@newMangeProfile']);
        Route::get('/account-setting', ['as' => 'user.setting', 'uses' => 'user\auth\UserController@userSetting']);
        Route::get('/apply/{job_id}', ['as' => 'user.apply', 'uses' => 'user\JobController@apply']);
        Route::post('/profile', ['as' => 'user.profile.post', 'uses' => 'user\auth\UserController@postProfile']);
        Route::get('/deactivate', ['as' => 'user.deactivate', 'uses' => 'user\UserController@deactivate']);
        Route::get('/applications', ['as' => 'user.applicaions.get', 'uses' => 'user\UserController@getJobsApplication']);
        Route::get('/application/{id}', ['as' => 'user.single.application.get', 'uses' => 'user\UserController@getSingleApplication']);
        Route::get('/filterJobs', ['as' => 'user.jobs.filter', 'uses' => 'user\UserController@filterJobs']);
        Route::get('/share/profile/{provider}', ['as' => 'user.profile.share', 'uses' => 'user\UserController@shareProfile']);
        Route::get('/follow/{company_id}', ['as' => 'user.company.follow', 'uses' => 'user\CompanyController@followCompany']);
        Route::get('/recommended', ['as' => 'user.recommendations', 'uses' => 'user\JobController@getRecommendations']);
        Route::post('/changePassword', ['as' => 'user.password.change', 'uses' => 'user\auth\UserController@changePassword']);
        Route::get('/manage', ['as' => 'user.profile.manage', 'uses' => 'user\auth\UserController@newMangeProfile']);

        // experience
        Route::post('/addexperience', ['as' => 'user.experience.post', 'uses' => 'user\auth\UserController@postExperience']);
        Route::post('/editexperience/{id}', ['as' => 'user.experience.edit', 'uses' => 'user\auth\UserController@editExperience']);
        Route::get('/experience/delete/{id}', ['as' => 'user.experience.delete', 'uses' => 'user\auth\UserController@deleteExperience']);

        // education
        Route::post('/addeducation', ['as' => 'user.education.post', 'uses' => 'user\auth\UserController@postEducation']);
        Route::post('/editeducation/{id}', ['as' => 'user.education.edit', 'uses' => 'user\auth\UserController@editEducation']);
        Route::get('/education/delete/{id}', ['as' => 'user.education.delete', 'uses' => 'user\auth\UserController@deleteEducation']);

        // languages
        Route::post('/addlanguage', ['as' => 'user.language.post', 'uses' => 'user\auth\UserController@postLanguage']);
        Route::get('/language/delete/{id}', ['as' => 'user.language.delete', 'uses' => 'user\auth\UserController@deleteLanguage']);

        // targets
        Route::post('/addtarget', ['as' => 'user.target.post', 'uses' => 'user\auth\UserController@postTarget']);
        Route::post('/edittarget/{id}', ['as' => 'user.target.edit', 'uses' => 'user\auth\UserController@editTarget']);

        // skills
        Route::post('/addskills', ['as' => 'user.skills.post', 'uses' => 'user\auth\UserController@postSkills']);

        // references
        Route::post('/editReferenes', ['as' => 'user.edit.references.post', 'uses' => 'user\auth\UserController@editReferences']);

        // delete image and set default
        Route::post('/deletePersonalPicture', ['as' => 'user.delete.picture', 'uses' => 'user\auth\UserController@deletePicture']);

        // delteed pernon vedio Cv
        Route::post('/deletePersonalVedioCv', ['as' => 'user.delete.vedio', 'uses' => 'user\auth\UserController@deleteVedioCv']);

        // certificates
        Route::post('/addcertificate', ['as' => 'user.certificate.post', 'uses' => 'user\auth\UserController@postCertificate']);
        Route::post('/editcertificate/{id}', ['as' => 'user.certificate.edit', 'uses' => 'user\auth\UserController@editCertificate']);
        Route::get('/certificate/delete/{id}', ['as' => 'user.certificate.delete', 'uses' => 'user\auth\UserController@deleteCertificate']);

        Route::get('/interview/{channel_name}', ['as' => 'user.live.interview', 'uses' => 'user\InterviewController@getLiveInterview']);
        Route::get('/record/{channel_name}', ['as' => 'user.record.interview', 'uses' => 'user\InterviewController@getRecordInterview']);
        Route::post('/upload/record/{record_id}', ['as' => 'user.upload.record', 'uses' => 'user\InterviewController@uploadRecord']);


        Route::get('/interview_v2/{channel_name}', ['as' => 'user.live.interview2', 'uses' => 'user\InterviewController@newLiveInterview']);
    });

    Route::get('/download', ['as' => 'user.cv.download', 'uses' => 'user\UserController@downloadCv'])->middleware('user_auth');

    Route::post('/subscribe', ['as' => 'user.subscribe.post', 'uses' => 'user\SubscriptionController@postSubscribe']);
});
