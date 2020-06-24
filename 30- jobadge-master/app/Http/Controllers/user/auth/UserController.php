<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Requests\CertificateRequest;
use App\Category;
use App\City;
use App\Certificate;
use App\Company;
use App\Country;
use App\Education;
use App\ForgetPassword;
use App\Http\Controllers\Controller;
use App\Industry;
use App\JobType;
use App\Language;
use App\Nationality;
use App\Size;
use App\Skill;
use App\TargetJob;
use App\User;
use App\WorkExperience;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\NullableType;
use Socialite;

class UserController extends Controller
{
    protected $user_model;
    protected $request;

    public function __construct(User $user_model, Request $request)
    {
        $this->user_model = $user_model;
        $this->request = $request;
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin()
    {

        $this->validate($this->request, $this->user_model->loginRules());

        isset($this->request->remember_me) ? $remember_me = true : $remember_me = false;
        $url  = session()->get('url.intended');
        if (Auth::guard('user')->attempt([
            'email' => $this->request->email,
            'password' => $this->request->password,
            'suspend' => 0,
            'verified' => 1,
        ], $remember_me)) {
            $user = auth()->guard('user')->user();
            $user->activate();

            if (session()->get('job_link')) {
                return redirect(session()->get('job_link'));
            }
            if($url)
                    return redirect($url);
            return redirect()->route('user.index');
        }

        if (Auth::guard('company')->attempt([
            'email' => $this->request->email,
            'password' => $this->request->password,
            'suspend' => 0,
            'verified' => 1,
        ], $remember_me)) {
            $company = auth()->guard('company')->user();
            $company->activate();

            if (session()->get('job_link')) {
                return redirect(session()->get('job_link'));
            }
            if($url)
                    return redirect($url);

            return redirect()->route('user.index');
        }

        return back()->withErrors('wrong email or password');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.index');
    }

    public function getRegister(Country $country_model, Size $size_model, Industry $industry_model, Nationality $nationality_model)
    {
        $countries = $country_model->get();
        $industries = $industry_model->get();
        $nationalities = $nationality_model->get();
        $sizes = $size_model->get();
        return view('auth.register', compact('countries', 'industries', 'sizes', 'nationalities'));
    }

    public function postRegister()
    {
        $this->validate($this->request, $this->user_model->getCreateRules());

        $this->validate($this->request, [
            'terms_conditions' => 'required',
        ]);

        // upload cv
        $cv_name = null;
        if ($this->request->hasFile('cv')) {
            $cv_name = $this->user_model->uploadUserCv($this->request->cv);
        }

        // upload video cv
        if ($this->request->hasFile('video_cv')) {
            $this->validate($this->request, $this->user_model->validate_video_cv());
            $video_name = $this->user_model->uploadVideoCv($this->request->video_cv);
        }

        $code = bin2hex(random_bytes(20));

        $user = $this->user_model->create([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'title' => $this->request->title,
            'email' => $this->request->email,
            'password' => bcrypt($this->request->password),
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'nationality_id' => $this->request->nationality_id,
            'phone' => $this->request->phone,
            'cv' => $cv_name,
            'video_cv' => isset($video_name) ? $video_name : null,
            'age' => $this->request->age,
            'gender' => $this->request->gender,
            'verify_code' => $code,
            // escape verification step
            'verified' => 1,
        ]);

        // escape verification step
        // $this->user_model->sendMailToVerify($this->request->email, $this->request->first_name, $code);
        auth("user")->login($user, true);
        // return back()->withMessage('please verify your email');'
        session(['register_status' => 'ok']);
        session()->flash('comeRegister', 'Task was successful!');
        // return redirect()->route('user.user.get')->withMessage('Login With Your Account');
        return redirect()->route('user.profile')->withMessage('Registered sucessfully , Complete Your Information');
    }

    public function getProfile(Country $country_model, Nationality $nationality_model)
    {
        $user = auth()->guard('user')->user();
        $countries = $country_model->get();
        $nationalities = $nationality_model->get();
        $cities = array();

        if ($user->city_id) {
            $cities = $user->country->cities;
        }
        // session()->flash('comeRegister', 'Task was successful!');
        return view('user.pages.profile', compact('user', 'countries', 'cities', 'nationalities'));
    }

    // Start New User Profile Routes
    public function newMangeProfile(Country $country_model, Nationality $nationality_model, Industry $industry_model, Category $category_model, JobType $jobtype_model)
    {
        $user    = auth("user")->user();
        $user->load(
            [
                "work_experiences.country","work_experiences.city","work_experiences.industry",
                "languages","skills",
                "target_job.categories",
                "target_job.industries",
                "certificates",
                "educations.country",
            ]
        );
        $countries = $country_model->get();
        $nationalities = $nationality_model->get();
        $cities = array();
        $industries = $industry_model->get();
        $categories = $category_model->get();
        $jobtypes = $jobtype_model->get();

        if ($user->city_id) {
            $cities = $user->country->cities;
        }
        return  view('user.pages.manageProfile.new-edit-profile',compact("user", 'countries', 'cities','categories' ,'industries','jobtypes','nationalities'));
    }

    // setting
    public function userSetting(Request $request){
        $user = auth("user")->user();
        return  view('user.pages.manageProfile.accountSetting',compact("user"));
    }
    // delte user image and set image defulat()
    public function deletePicture()
    {
        $user = auth()->guard('user')->user();
        $user->deleteUserImage();
        $user->update([
            'image' => "user.png",
        ]);
        return back()->withMessage('Picture Deleted sucessfully');
    }


    // delte user Vedio Cv and set image defulat()
    public function deleteVedioCv()
    {
        $user = auth()->guard('user')->user();
        $user->deleteVideoCv();
        $user->update([
            'video_cv' => "",
        ]);
        return back()->withMessage('video Cv deleted sucessfully');
    }



    public function postProfile(User $user_model)
    {
        // dd(request()->all());
        $user = auth()->guard('user')->user();

        $this->validate($this->request, $user_model->getUpdateRules($user->id));

        $user->update([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'title' => $this->request->title,
            'email' => $this->request->email,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'nationality_id' => $this->request->nationality_id,
            'phone' => $this->request->phone,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'birth_date' => $this->request->birth_date,
            'gender' => $this->request->gender,
        ]);

        if (isset($this->request->password)) {
            $this->validate($this->request, $this->user_model->password_validate());
            $user->update(['password' => bcrypt($this->request->password)]);
        }

        // upload user image
        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->user_model->validate_image());
            $imageName = $user->uploadUserImage($this->request->image);
            $user->deleteUserImage();
            $user->update([
                'image' => $imageName,
            ]);
        }

        // upload cv
        if ($this->request->hasFile('cv')) {
            $this->validate($this->request, $this->user_model->validate_cv());
            $cv_name = $user->uploadUserCv($this->request->cv);
            $user->deleteUserCv();
            $user->update([
                'cv' => $cv_name,
            ]);
        }

        // upload video cv
        if ($this->request->hasFile('video_cv')) {
            $this->validate($this->request, $this->user_model->validate_video_cv());
            $video_name = $user->uploadVideoCv($this->request->video_cv);
            $user->deleteVideoCv();
            $user->update([
                'video_cv' => $video_name,
            ]);
        }

        return back()->withMessage('Profile Updated Successfully');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $social_user = $this->user_model->checkSocialUser($user, $provider);

            if ($social_user) {
                if (!Auth::guard('user')->loginUsingId($social_user->id)) {
                    abort(500);
                }
                $social_user->activate();

                if (session()->get('job_link')) {
                    return redirect(session()->get('job_link'));
                }

                return redirect()->route('user.index');
            }
            $user = $this->user_model->createSocialUser($user, $provider);
            Auth::guard('user')->loginUsingId($user->id);
            if (session()->get('job_link')) {
                return redirect(session()->get('job_link'))->with('success', 'success');
            }

            return redirect()->route('user.index')->with('success', 'success');
        } catch (\Throwable $th) {
            return redirect()->route('user.login.get');
        }
    }

    public function getForgetPassword()
    {
        return view('user.pages.forgetPassword');
    }

    public function postForgetPassword(ForgetPassword $forget_model, User $user_model, Company $company_model)
    {
        $this->validate($this->request, $forget_model->getSendMailValidate());

        $user = $user_model->where('email', $this->request->email)->first();

        $company = $company_model->where('email', $this->request->email)->first();

        if (!$user && !$company) {
            return back()->withErrors('this email doesnt exist');
        }

        if ($user) {
            $user_forget = $forget_model->where([
                'user_id' => $user->id,
                'type' => 'user',
            ])->first();
        }

        if ($company) {
            $user_forget = $forget_model->where([
                'user_id' => $company->id,
                'type' => 'company',
            ])->first();
        }

        if ($user_forget) {
            $user_forget->sendMailToUser($user_forget->token);
        } else {
            $token = bin2hex(random_bytes(20));

            if ($company) {
                $forget_model->create([
                    'user_id' => $company->id,
                    'token' => $token,
                    'type' => 'company',
                ]);
            } else {
                $forget_model->create([
                    'user_id' => $user->id,
                    'token' => $token,
                    'type' => 'user',
                ]);
            }

            $forget_model->sendMailToUser($token);
        }

        return back()->withMessage('please check your mail to enter your new password');
    }

    public function getNewPassword($token, ForgetPassword $forget_model)
    {
        $user_forget = $forget_model->where('token', $token)->firstOrFail();
        return view('user.pages.newPassword', compact('token'));
    }

    public function postNewPassword($token, ForgetPassword $forget_model)
    {
        $this->validate($this->request, $forget_model->getChangePasswordRules());

        $user_forget = $forget_model->where('token', $token)->firstOrFail();

        if ($user_forget->type == 'user') {
            $user = $user_forget->user;
        } else {
            $user = $user_forget->company;
        }

        if (Hash::check($this->request->password, $user->password)) {
            return back()->withErrors('this is your old password');
        }

        $user->update([
            'password' => bcrypt($this->request->password),
        ]);

        $user_forget->delete();

        return redirect()->route('user.login.get')->withMessage('your password has been changed');
    }

    public function SetFcmToken()
    {
        $fcm_token = $this->request->token;
        if (auth()->guard('user')->check() && auth()->guard('user')->user()->isActivated()) {
            $user = auth()->guard('user')->user();
            $user->update(['fcm_token' => $fcm_token]);
        }
    }

    public function changePassword()
    {
        $this->validate($this->request, $this->user_model->validateNewPassword(), $this->user_model->getChangePasswordRules());
        $user = auth()->guard('user')->user();

        if (!Hash::check($this->request->old_password, $user->password)) {
            return back()->withErrors('wrong old password');
        }

        $user->update([
            'password' => bcrypt($this->request->password),
        ]);

        return back()->withMessage('password changed successfully');
    }

    public function verifyAccount($code, User $user_model, Company $company_model)
    {
        $user = $user_model->where([
            'verify_code' => $code,
            'verified' => 0,
        ])->first();

        if (!$user) {
            $user = $company_model->where([
                'verify_code' => $code,
                'verified' => 0,
            ])->firstOrFail();
        }

        $user->update([
            'verified' => 1,
        ]);

        return redirect()->route('user.login.get')->withMessage('your email has been verified');
    }

    public function getManageProfile(Country $country_model, Industry $industry_model, Category $category_model, JobType $jobtype_model)
    {
        $user = auth()->guard('user')->user();
        
        $countries = $country_model->get();
        $industries = $industry_model->get();
        $categories = $category_model->get();
        $jobtypes = $jobtype_model->get();
        return view('user.pages.manageProfile', compact('user', 'countries', 'industries', 'jobtypes', 'categories'));
    }

    // experience

    public function postExperience(WorkExperience $workExperience_model)
    {
        $this->validate($this->request, $workExperience_model->getCreateAndUpdateRules());

        if ($this->request->achievements) {
            $this->validate($this->request, $workExperience_model->validate_acheivments());
        }

        if ($this->request->reporting_to) {
            $this->validate($this->request, $workExperience_model->validate_reporting_to());
        }

        if (isset($this->request->till_present)) {
            $user = auth()->guard('user')->user();
            $till_now = $workExperience_model->checkIfUserHasTillNow($user->id);

            if ($till_now) {
                return back()->withMessage('you working now at somewhere else')->withInput();
            }
        } else {
            $this->validate($this->request, $workExperience_model->validateEndDate());
            $to_date = $this->request->to_date;
        }
        // dd(request());
        $workExperience_model->create([
            'title' => $this->request->title,
            'company_name' => $this->request->company_name,
            'reporting_to' => $this->request->reporting_to,
            'industry_id' => $this->request->industry_id,
            'from' => $this->request->from_date,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'to' => isset($this->request->till_present) ? null : $to_date,
            'job_description' => $this->request->description,
            'achievements' => $this->request->achievements,
            'user_id' => auth()->guard('user')->user()->id,
            'till_present' => isset($this->request->till_present) ? 1 : 0,
        ]);

        return back()->withMessage('Experience added successfully')->withInput(["tabBack"=>"works"]);
    }

    public function deleteExperience($id, WorkExperience $workExperience_model)
    {
        $user = auth()->guard('user')->user();
        $experience = $workExperience_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();
        return $experience->delete() ? back()->withMessage('Experience has been deleted')->withInput(["tabBack"=>"works"]) : abort(500);
    }

    public function editExperience($id, WorkExperience $workExperience_model)
    {
        $user = auth()->guard('user')->user();
        $experience = $workExperience_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();

        $this->validate($this->request, $workExperience_model->getCreateAndUpdateRules());

        if (isset($this->request->till_present)) {
            $user = auth()->guard('user')->user();
            $till_now = $experience->TillNowExcept($user->id);

            if ($till_now) {
                return back()->withMessage('you working now at somewhere else')->withInput();
            }
        } else {
            $this->validate($this->request, $workExperience_model->validateEndDate());
            $to_date = $this->request->to_date;
        }

        $experience->update([
            'title' => $this->request->title,
            'company_name' => $this->request->company_name,
            'reporting_to' => $this->request->reporting_to,
            'industry_id' => $this->request->industry_id,
            'from' => $this->request->from_date,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'job_description' => $this->request->description,
            'achievements' => $this->request->achievements,
            'till_present' => isset($this->request->till_present) ? 1 : 0,
            'to' => isset($this->request->till_present) ? null : $to_date,
        ]);

        return back()->withMessage('Experience edited successfully');
    }

    // end experience

    // education

    public function postEducation(Education $education_model)
    {
        // dd(request());
        $this->validate($this->request, $education_model->getCreateAndUpdateRules());
        // dd(request());
        // dd( date('d-m-Y', strtotime(request()->to_year)) );
        // dd($this->request->degree);
        // \Carbon::createFromFormat('Y-m-d H:i:s', date('d-m-Y', strtotime(request()->to_year)) );

        $education_model->create([
            'degree' => $this->request->degree,
            'place_name' => $this->request->place_name,
            'major' => $this->request->major,
            'from_year' => $this->request->from_year,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'to_year' => $this->request->to_year,
            'notes' => $this->request->notes,
            "faculty" => $this->request->faculty,
            'user_id' => auth()->guard('user')->user()->id,
        ]);

        return back()->withMessage('education added successfully');
    }




    public function deleteEducation($id, Education $education_model)
    {
        $user = auth()->guard('user')->user();
        $experience = $education_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();
        return $experience->delete() ? back()->withMessage('education has been deleted') : abort(500);
    }

    public function editEducation($id, Education $education_model)
    {
        $user = auth()->guard('user')->user();
        $education = $education_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();

        $this->validate($this->request, $education_model->getCreateAndUpdateRules());

        $education->update([
            'degree' => $this->request->degree,
            'place_name' => $this->request->place_name,
            'major' => $this->request->major,
            'from_year' => $this->request->from_year,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'to_year' => $this->request->to_year,
            'notes' => $this->request->notes,
            "faculty" => $this->request->faculty,
        ]);

        return back()->withMessage('education edited successfully');
    }

    // end eduction

    // language

    public function postLanguage(Language $language_model)
    {
        $user = auth()->guard('user')->user();
        $this->validate($this->request, $language_model->getCreateRules($user->id));

        $language_model->create([
            'language' => $this->request->language,
            'rate' => $this->request->rate,
            'user_id' => auth()->guard('user')->user()->id,
        ]);

        return back()->withMessage('language added successfully') ; // ->withInput(request()->only(["tab","model"]))
    }


    // referenccs
    public function editReferences()
    {
        $user  = auth("user")->user();
        if (isset($this->request->ref1_name) || isset($this->request->ref1_phone) || isset($this->request->ref1_title)) {
            $this->validate($this->request, $this->user_model->validateRef1());
        }

        if (isset($this->request->ref2_name) || isset($this->request->ref2_phone) || isset($this->request->ref2_title)) {
            $this->validate($this->request, $this->user_model->validateRef2());
        }
        $user->update([
            'ref1_name' => $this->request->ref1_name,
            'ref1_phone' => $this->request->ref1_phone,
            'ref1_title' => $this->request->ref1_title,
            'ref2_name' => $this->request->ref2_name,
            'ref2_phone' => $this->request->ref2_phone,
            'ref2_title' => $this->request->ref2_title,
        ]);

        return redirect()->back()->withMessage('References updated successfully !');
    }

    public function deleteLanguage($id, Language $language_model)
    {
        $user = auth()->guard('user')->user();
        $language = $language_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();
        return $language->delete() ? back()->withMessage('language has been deleted') : abort(500);
    }

    // end language

    // target jobs

    public function postTarget(TargetJob $target_model)
    {
        $this->validate($this->request, $target_model->getCreateAndUpdateRules());

        $target = $target_model->create([
            'title' => $this->request->title,
            'category_id' => $this->request->category_id,
            'industry_id' => $this->request->industry_id,
            'jobtype_id' => $this->request->jobtype_id,
            'salary_from' => $this->request->salary_from,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'salary_to' => $this->request->salary_to,
            "show_salary" => isset($this->request->show_salary) && !is_null($this->request->show_salary) ? 0 : 1,
            'user_id' => auth()->guard('user')->user()->id,
        ]);
        $target->categories()->sync($this->request->categories);
        $target->industries()->sync($this->request->industries);
        return back()->withMessage('target added successfully');
    }

    public function editTarget($id, TargetJob $target_model)
    {

        $user = auth()->guard('user')->user();
        $target = $target_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();

        $this->validate($this->request, $target_model->getCreateAndUpdateRules());

        if (!$target_model->validate_salary($this->request->salary_from, $this->request->salary_to)) {
            return back()->withErrors(["salary_from" =>'salary from must be smaller than salary to'])->withInput();
        }
        //    dd(request()->all());
        $target->update([
            'title' => $this->request->title,
            'category_id' => $this->request->category_id,
            'industry_id' => $this->request->industry_id,
            'jobtype_id' => $this->request->jobtype_id,
            'salary_from' => $this->request->salary_from,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'salary_to' => $this->request->salary_to,
            "show_salary" => isset($this->request->show_salary) && !is_null($this->request->show_salary) ? 0 : 1,
        ]);

        $target->categories()->sync($this->request->categories);
        $target->industries()->sync($this->request->industries);

        return back()->withMessage('target job edited successfully');
    }
    // end target

    // skills

    public function postSkills(Skill $skill_model)
    {

        // dd( $this->request->skills);
        $this->validate($this->request, $skill_model->create_rules());

        $user = auth()->guard('user')->user();

        if (is_null($this->request->skills)) {
            $user->skills()->delete();
            return back()->withMessage('skills empty successfully');
        }
        $skills = explode(',', $this->request->skills);

        foreach ($skills as $skill) {
            if (strlen($skill) > 200) {
                return back()->withErrors('each skill must be less than or equal 200 chars')->withInput();
            }
        }

        $user->skills()->delete();

        foreach ($skills as $skill) {
            $skill_model->create([
                'skill' => $skill,
                'user_id' => $user->id,
            ]);
        }

        return back()->withMessage('skills updated successfully')->withInput();
    }

    // end skills

    // certificates

    public function postCertificate(CertificateRequest $CertificateRequest)
    {
        $user = auth()->guard('user')->user();

        Certificate::create([
            'name' => $this->request->name,
            'place_name' => $this->request->place_name,
            'member_id' => $this->request->member_id ? $this->request->member_id : '',
            'date' => $this->request->date ? $this->request->date : '',
            'expired_date' => !$this->request->no_expire ? $this->request->expired_date : null,
            'user_id' => $user->id,
        ]);

        return back()->withMessage('certificate added successfully');
    }

    public function editCertificate($id, CertificateRequest $CertificateRequest)
    {
        $user = auth()->guard('user')->user();

        $certificate = Certificate::where(['id' => $id, 'user_id' => $user->id])->firstOrFail();

        $certificate->update([
            'name' => $this->request->name,
            'place_name' => $this->request->place_name,
            'member_id' => $this->request->member_id ? $this->request->member_id : '',
            'date' => $this->request->date,
            'expired_date' => !$this->request->no_expire ? $this->request->expired_date : null,
        ]);
        $certificate->refresh();
        // dd($certificate->toArray(),$this->request->expired_date);

        return back()->withMessage('certificate updated successfully');
    }

    public function deleteCertificate($id, Certificate $certificate_model)
    {
        $user = auth()->guard('user')->user();
        $certificate = $certificate_model->where(['id' => $id, 'user_id' => $user->id])->firstOrFail();

        return $certificate->delete() ? back()->withMessage('certificate has been deleted') : abort(500);
    }
}
