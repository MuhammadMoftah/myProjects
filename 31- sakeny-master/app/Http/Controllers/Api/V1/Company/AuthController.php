<?php

namespace App\Http\Controllers\Api\V1\Company;
use Log;
use Hash , Auth;
use App\Models\Ads;
use App\Models\User;
use App\Models\Company;
use App\Models\Agent;
use App\Models\Package;
use App\Models\Settings;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Notifications\WelcomeEmail;
use App\Http\Controllers\Api\BaseController;

class AuthController extends BaseController
{
    protected $user;

    function __construct()
    {
        parent::__construct();
        $this->model = new Company;
        $this->user = new User;
    }


    public function reGenerateApiToken($user)
    {
        # Generate uniqueKey
        $api_token = md5(bcrypt($user->email));
        $user = $user->update([
            'api_token' => $api_token,
        ]);

    }

    public function getSplashRegistartionCompanies()
    {
        $companies = Company::where('in_registration', 1);
        if (request('country_id')) {
            $companies = $companies->where(request(['country_id']));
        }
        $companies = $companies->count();
        $selected_ads = Ads::Active()->Valid();
        if (request('country_id')) {
            $selected_ads = $selected_ads->where(request(['country_id']));
        }
        $selected_ads = $selected_ads->where('is_selected', 1)->get();

        $units_number = Ads::whereHas('owner', function($query){
            $query->CompanyQ();
        });
        if (request('country_id')) {
            $units_number = $units_number->where(request(['country_id']));
        }
        $units_number = $units_number->count();

        $setting = Settings::first();
        $setting->increment('view_company_registration_page');
        return $this->response(
            [
                'companies'=> $companies,
                'units_number'=> $units_number,
                'views' => $setting->view_company_registration_page,
                'selected_ads'=> $selected_ads,
            ]
        );
    }


    public function getSplashRegistartionCompany($id)
    {
        $company = Company::where('in_registration', 1)->find($id);

        $active_agents = Agent::Agent()->Active()->where('company_id', $id)->count();
        $available_agents = Agent::Agent()->where('company_id', $id)->count();

        $active_ads = Ads::active()->where('owner_id', $company->id)->count();
        $valid_active = Ads::Valid()->active()->where('owner_id', $company->id)->count();
        $deactive_active = Ads::Deactive()->where('owner_id', $company->id)->count();
        $expired_active = Ads::Expired()->active()->where('owner_id', $company->id)->count();
        $premium_active = Ads::where('owner_id', $company->id)
                                ->where('is_premium', '!=', null)->count();

        $units_number = Ads::whereHas('owner', function($query){
           $query->CompanyQ();
        })->count();
        $packages = Package::active()->get();
        $setting = Settings::first();
        $setting->increment('view_company_registration_page');
        return $this->response(
            [
                'company'=> $company,
                'active_agents'=> $active_agents,
                'available_agents'=> $available_agents,
                'active_ads'=> $active_ads,
                'valid_active'=> $valid_active,
                'deactive_active'=> $deactive_active,
                'expired_active'=> $expired_active,
                'premium_active'=> $premium_active,
                'packages'=> $packages,
                'units_number'=> $units_number,
                'views' => $setting->view_company_registration_page,
            ]
        );
    }

    /**
     * Authentication area
     */
    public function signup()
    {
        $this->validator([
            'email' => 'required|email|unique:users|unique:admins',
            'phone' => 'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users',
            // 'password' => 'required|regex:((?=.*\\d)(?=.*[A-Z]).{6,6})',
            'image' => 'image',
            'name' => 'required|max:255',
            'registered_name' => 'required|max:255',
            'description' => 'required',
            'cr_number' => 'required',
            'cr_number_file' => 'required',
            'city' => 'required',
            'num_agents' => 'required',
            'zip_code' => 'required',
            'logo' => 'required|image',
        ],[
            // "password.regex"=>trans('lang.Password must include small and capital letter.')
        ]);

        $activation = rand(1000,9999);

        # create new user
        $user = User::create(
            request(['name', 'email', 'phone']) +
            [
                'activation' => $activation,
                'type' => 2,
                'image'=>request('logo')
            ]
        );

        $number_of_premium_ads = 0;
        $number_of_regular_ads = 0;
        $number_of_agents = request('num_agents');
        $number_of_repost = 0;

        if (request('package_id')) {
            $package = Package::find(request('package_id'));
            if ($package) {
                $number_of_premium_ads = $package->number_of_premium_ads;
                $number_of_regular_ads = $package->number_of_regular_ads;
                $number_of_agents = $package->number_of_agents;
                $number_of_repost = $package->number_of_repost_ads;
            }
        }else {
            $number_of_agents = request('num_agents');
        }

        # complete company profile
        $company = $this->model->create(
            request(['registered_name', 'description', 'cr_number', 'cr_number_file',
                'phone', 'city', 'zip_code', 'logo','country_id']) +
            [
                'user_id' => $user->id,
                'number_of_premium_ads'=>$number_of_premium_ads,
                'number_of_regular_ads'=>$number_of_regular_ads,
                'number_of_agents'=>$number_of_agents,
                'number_of_repost'=>$number_of_repost,
            ]
        );

        //generate api token
        $this->reGenerateApiToken($user);

        //you can implement any staff here after register like fire event, send welcome email ...etc

        $company = $this->model->find($company->id);

        //send activation code sms
        // $this->sendSms($user->phone, "Your code is $activation");
        $user = User::find($user->id);
        $user->makeVisible('api_token');
        // $this->sendActivationMail($user);
        return $this->response(['company' => $company,'user'=>$user]);
    }


    public function postActiveAccount()
    {
        $this->validator([
            'password' => 'required|regex:((?=.*\\d)(?=.*[A-Z]).{6,6})',
        ],[
            "password.regex"=>trans('lang.Password must include small and capital letter.')
        ]);
        $user = $this->auth;
        if (empty($user->password)) {
            $this->auth->update(['password'=>request('password')]);
            return $this->response(['user'=>$user]);
        }
        return $this->buildValidationMessage('message',trans('lang.Your account already activated and waiting admin approval'),1);
    }

    public function postResendActivationCode()
    {
        return abort(404);
        $code = $this->auth->activation;
        $phone = $this->auth->phone;
        $this->sendActivationMail($this->auth);
        // $this->sendSms($phone, $code);
        return $this->response(['message'=>trans('lang.Activation code sent successfully')]);
    }

    public function sendActivationMail($user)
    {
        $email = $user->email;
        $subject = "Your activation code - Sakeny";
        $url = "http://sakeny.com/en/company/activate/{$user->api_token}";
        $content = "Thank your for your registration. <br> please activation your account with link below <br>
            <a href='{$url}'>{$url}</a>";

        $this->sendMail($email, $subject, $content);
    }


    /**
     * sign in function
     * @return [type] [description]
     */
    public function signin()
    {
        $this->validator([
             'name' => 'required',
             'password' => 'required'
        ]);

        //login via email/phone
        $user = $this->user->CompanyQ()
            ->where(function($query){
              $query->where('email', request('name'))
                ->orWhere('phone', request('name'))  ;
            })->first();

        if ($user && Hash::check(request('password'),$user->password)) {
            //generate api token
            $this->reGenerateApiToken($user);
            return $this->response(['user'=>$user]);
        }

        return $this->buildValidationMessage('message', trans('auth.failed'), 1);
    }

    /**
     * End of authentication area
     */



    /**
     * account setting area
     */
    public function updatePassword()
    {
        $user = $this->auth;

        //social register update his profile for first time and dont have password
        if (empty($user->password)) {
            $this->validator(array(
                 'new_password'=>'required|min:6||regex:((?=.*\\d)(?=.*[A-Z]).{6,6})',
             ));
            $user->update(['password'=>request('new_password')]);
            return $this->response(['message'=>[trans('lang.Your password changed successfully')]]);
        }
        else {
            $this->validator(array(
                 'new_password'=>'required|min:6||regex:((?=.*\\d)(?=.*[A-Z]).{6,6})',
                 'old_password'=>'required',
             ));
            if (request('old_password') == request('new_password')) {
                return $this->buildValidationMessage('new_password', trans('lang.New password musnt match the current password'),3);
            }
            if (Hash::check(request('old_password'), $user->password)) {
                $user->update(['password'=>request('new_password')]);
                return $this->response(['message'=>trans('lang.Your password changed successfully')]);
            }
            return $this->buildValidationMessage('password',trans('lang.incorrectpassword'),4);
        }

        return $this->response(['message'=>trans('No action!')]);

    }

    /**
     * update profile instance of table `users`
     * @return json
     */
    public function updateProfile()
    {
        $user = $this->auth->user;
        $this->validator(array(
             'name'=>'required|min:3',
             'email'=>'required|email|unique:admins|unique:users,email,'.$user->id,
             'logo'=>'image',
         ));
        $user->update(request(['name', 'email','country_id'] + ['image'=>request('logo')]));
        $user->company->update(['logo'=>request('logo')]);
        return $this->response(['user'=>$user]);
    }

    /**
     * refresh user data
     * @return json
     */
    public function getProfile()
    {
        $user = $this->auth;
        $active_ads  = $this->auth->ads()->valid()->count();
        $premium_ads  = $this->auth->ads()->valid()->whereNotNull('is_premium')->count();
        $expired_ads = $this->auth->ads()->expired()->count();
        $deativated_ads = $this->auth->ads()->Deactive()->count();
        $company = $user->company;
        $active_agents = $this->auth->company_agents()->active()->count();

        $number_of_premium_ads = 0;
        $number_of_regular_ads = 0;
        $number_of_agents = 0;
        if ($company) {
            $number_of_premium_ads = $company->number_of_premium_ads;
            $number_of_regular_ads = $company->number_of_regular_ads;
            $number_of_agents = $company->number_of_agents;
        }
        $views = $this->auth->ads()->sum('views');
        return $this->response(compact('user', 'active_ads', 'expired_ads','number_of_premium_ads','number_of_regular_ads','number_of_agents','active_agents','premium_ads','deativated_ads','views'));
    }

    /**
     * update phone number area
     */

    /**
     * send request sms to mobile with confirmation code
     * @return [type] [description]
     */
    public function requestUpdatePhone()
    {
        $user = $this->auth;
        $this->validator([
             'phone'=>'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users,phone,'.$user->id,
        ]);

        $temp_phone_code = rand(1000,9999);

        $user->update([
            'temp_phone_code'=>$temp_phone_code,
        ]);

        $this->sendMail($user->email, $temp_phone_code);
        $this->sendSms(request('phone'), "Your activation phone number code is $temp_phone_code");

        return $this->response(['code'=>$temp_phone_code]);
    }

    /**
     * update phone number
     * @return [type] [description]
     */
    public function updatePhone()
    {
        $user = $this->auth;
        $this->validator([
             'phone'=>'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users,phone,'.$user->id,
             'temp_phone_code'=>'required'
         ]);

        if ($user->temp_phone_code == request('temp_phone_code')) {
            $user->update([
                'temp_phone_code'=>null,
                'phone'=>request('phone'),
                'activation'=>1
            ]);
            return $this->response(['user'=>$user]);
        }
        return $this->buildValidationMessage('temp_phone_code', trans('lang.Invalid code'),2);

    }


    /**
     * reset password areas
     */
    public function postSendResetPasswordCode()
    {
        $this->validator(['name'=>'required','reset_method'=>'required']);

        $reset_method = request('reset_method');
        if ($reset_method == 'phone') {
            $user = $this->model->User()->where('phone',request('name'))->first();
        }else {
            $user = $this->model->User()->where('email',request('name'))->first();
        }

        if (!$user)
            return $this->buildValidationMessage('name', trans('lang.The selected phone is invalid.'),1);

        if ($user->activation == 0)
            return $this->buildValidationMessage('name', trans('lang.youraccountdeactivated'),2);

        // create reset password
        $reset_password_code = mt_rand(1000,9999);

        // assign to user
        $set_reset_key = $user->update(['reset_password_code'=>$reset_password_code]);

        if ($reset_method == 'phone') {
            $this->sendSms($user->phone, "Your code reset password code is $reset_password_code");
            return $this->response(['message'=>trans('lang.We have send you a sms with your reset code')]);
        }else {
            // todo : implement sent email
            $this->sendMail($user->email, "Your code reset password code is $reset_password_code");
            return $this->response(['message'=>trans('lang.We have send you a email with your reset code')]);
        }
    }


    public function patchResetPassword()
    {
        $this->validator([
            'reset_password_code'=>'required',
            'name'=>'required',
            'password'=>'required|regex:((?=.*\\d)(?=.*[A-Z]).{6,6})'
        ]);

        $reset_method = request('reset_method');
        if ($reset_method == 'phone') {
            $user = $this->model->User()->where([
                'phone'=>request('name'),'reset_password_code'=>request('reset_password_code')
            ])->first();
        }else {
            $user = $this->model->User()->where([
                'email'=>request('name'),'reset_password_code'=>request('reset_password_code')
            ])->first();
        }

        if ($user) {
            $user->update([
                'password'=>request('password'),
                'reset_password_code'=>''
            ]);
            return $this->response(['user'=>$user]);
        }

        return $this->buildValidationMessage('name',trans('lang.Invalid reset code'),3);
    }



    // Todo : not implemented yet
     public function getNotifications()
     {
        $notifications = (new Notification)
                                ->latest()
                                ->select(['id','data','created_at','read_at'])
                                ->get();
        return $this->response(['notifications'=>$notifications]);
     }

    public function patchNotificationSeen($id)
    {
        $this->auth->notifications()->where('id',$id)->first()->markAsRead();
        return $this->response(true);
    }




}
