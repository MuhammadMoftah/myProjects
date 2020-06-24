<?php
Route::group(['prefix' => 'company'], function () {

    Route::group(['middleware' => ['company_not_auth', 'back_btn']], function () {
        Route::post('/register', ['as' => 'company.register.post', 'uses' => 'company\auth\CompanyController@postRegister']);
    });

    // dd(route('company.register.post'));
    
    Route::group(['middleware' => ['CompanyAuthNotVerified']], function () { 
        Route::get('/logout', ['as' => 'company.logout', 'uses' => 'company\auth\CompanyController@logout']); 
    }); 
    Route::group(['middleware' => ['company_auth', 'back_btn']], function () {
        Route::get('/invite', ['as' => 'company.invite.get', 'uses' => 'company\CompanyController@getInvite']);
        Route::post('/invite', ['as' => 'company.invite.post', 'uses' => 'company\CompanyController@postInvite']);

        Route::get('/profile', ['as' => 'company.profile', 'uses' => 'company\auth\CompanyController@getProfile']);
        Route::post('/profile', ['as' => 'company.profile.post', 'uses' => 'company\auth\CompanyController@postProfile']);
        
        Route::post('/changePassword', ['as' => 'company.password.change', 'uses' => 'company\auth\CompanyController@changePassword']);
        Route::get('/deactivate', ['as' => 'company.deactivate', 'uses' => 'company\CompanyController@deactivate']);
        Route::get('/postJob', ['as' => 'company.job.create', 'uses' => 'company\JobController@getCreateJob']);
        Route::post('/postJob', ['as' => 'company.job.post', 'uses' => 'company\JobController@postJob']);

        Route::get('/jobs', ['as' => 'company.jobs', 'uses' => 'company\JobController@getJobs']);
        Route::get('/job/{slug}', ['as' => 'company.job', 'uses' => 'company\JobController@getSingleJob']);

        Route::get('/draft/{id}', ['as' => 'company.draft.get', 'uses' => 'company\JobController@getDraft']);
        Route::post('/draft/{id}', ['as' => 'company.draft.post', 'uses' => 'company\JobController@postDraft']);
        
        Route::get('/applicant/{job_ib}/{userjob_id}', ['as' => 'company.get.applicant', 'uses' => 'company\UserController@getApplicant']);
        Route::get('/qualify/{userjob_id}', ['as' => 'company.applicant.qualified', 'uses' => 'company\UserController@qualifyState']);
        Route::get('/shortlist/{userjob_id}', ['as' => 'company.applicant.shortlist', 'uses' => 'company\UserController@shortListState']);
        Route::post('/reject/{userjob_id}', ['as' => 'company.applicant.reject', 'uses' => 'company\UserController@rejectState']);
        Route::get('/cvs', ['as' => 'company.cvs.get', 'uses' => 'company\UserController@getCVs']);
        Route::get('/jobseekers', ['as' => 'company.jobseekers.search', 'uses' => 'company\UserController@searchJobSeekers']);
        Route::get('/jobseeker/{id}', ['as' => 'company.jobseeker.view', 'uses' => 'company\UserController@getJobSeeker']);
        Route::get('/cv/{userjob_id}', ['as' => 'company.cv.view', 'uses' => 'company\UserController@viewCv']);
        Route::get('/cv/delete/{userjob_id}', ['as' => 'company.cv.delete', 'uses' => 'company\UserController@deleteCv']);
        Route::get('/description/get', ['as' => 'company.description.get', 'uses' => 'company\JobController@getDescription']);
        Route::get('/myJobs', ['as' => 'company.myjobs.get', 'uses' => 'company\JobController@getMyJobs']);
        Route::get('/switch/job/{id}', ['as' => 'company.job.switch', 'uses' => 'company\JobController@changeJobStatus']);
        Route::get('/all_apllicaions/{job_id}', ['as' => 'get.job.applications', 'uses' => 'company\JobController@all_apllicaions']);

        Route::get('/arrange/{userjob_id}', ['as' => 'company.arrange.interview.get', 'uses' => 'company\UserController@getArrangeInterview']);
        Route::post('/arrange/live/{userjob_id}', ['as' => 'company.arrange.live.post', 'uses' => 'company\InterviewController@postLiveInterview']);
        Route::post('/arrange/record/{userjob_id}', ['as' => 'company.arrange.record.post', 'uses' => 'company\InterviewController@postRecordInterview']);

        Route::get('/live_interview/{live}', ['as' => 'company.live.interview.get', 'uses' => 'company\UserController@viewDetailLiveInterview']);
        Route::post('/live_interview/{live}', ['as' => 'company.live.interview.update', 'uses' => 'company\UserController@updateLiveInterview']);
        Route::post('/delete_live_interview/{live}', ['as' => 'company.live.interview.delete', 'uses' => 'company\UserController@deleteLiveInterview']);



        Route::get('/accept/{userjob_id}', ['as' => 'company.accept.applicant', 'uses' => 'company\InterviewController@AcceptApplicant']);
        Route::post('/reject/applicant/{userjob_id}', ['as' => 'company.reject.applicant', 'uses' => 'company\InterviewController@RejectApplicant']);

        Route::get('/interview/{channel_name}', ['as' => 'company.live.interview', 'uses' => 'company\InterviewController@getLiveInterview']);

        Route::get('/job/invite/{job_id}/{user_id}', ['as' => 'company.invite.job', 'uses' => 'company\UserController@inviteUser']);
    });

    Route::get('/download/{cv_name}', ['as' => 'company.cv.download', 'uses' => 'company\UserController@downloadCv'])->middleware('company_auth');
});