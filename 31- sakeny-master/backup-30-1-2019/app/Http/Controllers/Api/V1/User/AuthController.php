<?php

namespace App\Http\Controllers\Api\V1\User;
use Log;
use Hash , Auth;
use App\Models\User;
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
        $this->user = new User;
    }


    public function reGenerateApiToken($user)
    {
        # Generate uniqueKey
        $api_token = md5(bcrypt($user->email));
        $user = $user->update([
            'api_token'=>$api_token,
        ]);

    }


    /**
     * Authentication area
     */
    public function signup()
    {
        $this->validator([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users|unique:admins',
            'phone' => 'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users',
            'password' => 'required|regex:((?=.*\\d)(?=.*[A-Z]).{6,6})',
            'image' => 'image'
        ],[
            "password.regex"=>trans('lang.Password must include small and capital letter.')
        ]);

        $activation = rand(1000,9999);

        $user = $this->user->create(
            request(['name','email','password','phone','gender','country_id','city_id']) +
            [
                'activation'=>$activation,
                'type'=>1,
            ]
        );

        //generate api token
        $this->reGenerateApiToken($user);

        //you can implement any staff here after register like fire event, send welcome email ...etc

        $user = $this->user->find($user->id);
        $user->makeVisible('api_token');
        // $user->api_token = $user->api_token;
        //send activation code sms
        $this->sendSms($user->phone, "Your code is $activation");
        $this->sendMail($user->email, "Sakeny Activation code", "Your code is $activation");

        return $this->response(['user'=>$user]);
    }


    public function postActiveAccount()
    {
        $code = request('code');
        if ($this->auth->activation != 1 && $this->auth->activation == $code) {
            $this->auth->update(['activation'=>1]);
            $user = $this->auth;
            $user->makeVisible('api_token');
            return $this->response(['user'=>$user]);
        }
        elseif($this->auth->activation == 1) {
            return $this->buildValidationMessage('message',trans('lang.Your account already activated'),1);
        }
        elseif($this->auth->activation != $code) {
            return $this->buildValidationMessage('message',trans('lang.Activation code incorrect'),2);
        }
        return $this->buildValidationMessage('message',trans('lang.Activation code incorrect'),2);
    }

    public function postResendActivationCode()
    {
        $code = $this->auth->activation;
        $phone = $this->auth->phone;
        $this->sendSms($phone, $code);
        return $this->response(['message'=>trans('lang.Activation code sent successfully')]);
    }


    /**
     * sign in function
     * @return [type] [description]
     */
    public function signin()
    {
        $this->validator([
             'name'=>'required',
             'password'=>'required'
        ]);

        //login via email/phone
        $user = $this->user->active()
            ->where(function($query){
              $query->where('email', request('name'))
                ->orWhere('phone', request('name'))  ;
            })->first();
        if ($user == null) {
        $user = $this->user->CompanyQ()
            ->where(function($query){
              $query->where('email', request('name'))
                ->orWhere('phone', request('name'))  ;
            })->first();
        }
        if ($user && Hash::check(request('password'),$user->password)) {
            //generate api token
            $user->makeVisible('api_token');
            $this->reGenerateApiToken($user);
            return $this->response(['user'=>$user]);
        }

        return $this->buildValidationMessage('message',trans('auth.failed'),1);
    }

    /**
     * End of authentication area
     */

    /**
     * Social media authentication area
     */


    /**
     * check if user registered
     */
     public function postSocialMediaAuthentication()
     {
        $this->validator([
           'social_id'=>'required',
           'social_type'=>'required|in:facebook,twitter,google,linkedin'
        ]);

        $social_id = request('social_id');
        $social_type = request('social_type');

        $user = $this->user->Active()
                    ->where(['social_type' => $social_type, 'social_id' => $social_id])
                    ->first();
        if ($user) {
            //generate api token
            $user->makeVisible('api_token');
            $this->reGenerateApiToken($user);
            return $this->response(['status'=>true,'user'=>$user]);
        }
        return $this->response(['status'=>false,'message'=>'user not exist']);
     }

    /**
     * check if user registered
     */
     public function postSocialMediaRegister()
     {
        $this->validator([
            'name'=>'required',
            'email'=>'required|email|unique:users|unique:admins',
            'phone'=>'required|regex:/^\+?\d[0-9-]{9,12}/|numeric|unique:users',
            'social_id'=>'required|unique:users',
            'social_type'=>'required|in:facebook,twitter,google,linkedin'
        ]);

        $social_id = request('social_id');
        $social_type = request('social_type');

        $user = $this->user->create(request(['social_id','social_type','email','name','phone'])+
        [
            'api_token'=>md5(bcrypt(uniqid())),
            'activation'=>1,
            'type'=>1,
        ]);
        if ($user) {
            $user->makeVisible('api_token');
            //generate api token
            $this->reGenerateApiToken($user);
            return $this->response(['status'=>true,'user'=>$user]);
        }
        return $this->response(['status'=>false]);
     }




    /**
     * End of Social media authentication area
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
        $user = $this->auth;
        $this->validator(array(
             'name'=>'required|min:3',
             'password'=>'min:6'
             // 'email'=>'required|email|unique:admins|unique:users,email,'.$user->id,
             // 'image'=>'image',
         ));
        $user->update(request(['name', 'password']));
        $user->makeVisible('api_token');
        return $this->response(['user'=>$user]);
    }

    /**
     * refresh user data
     * @return json
     */
    public function getProfile()
    {
        $user = $this->auth;
        $user->makeVisible('api_token');
        return $this->response(['user'=>$user]);
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
        $user->makeVisible('api_token');

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
            $user->makeVisible('api_token');
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
            $user = $this->user->active()->where('phone',request('name'))->first();
        }else {
            $user = $this->user->active()->where('email',request('name'))->first();
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
            $this->sendMail($user->email, 'Your reset password code',"Your code reset password code is $reset_password_code");
            return $this->response(['message'=>trans('lang.We have send you a email with your reset code')]);
        }
        return $this->response(['message'=>trans('lang.We have send you a sms with your reset code'),
                                'reset_password_code'=>$reset_password_code]);
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
            $user = $this->user->active ()->where([
                'phone'=>request('name'),'reset_password_code'=>request('reset_password_code')
            ])->first();
        }else {
            $user = $this->user->active ()->where([
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
        Notification::where('id',$id)->first()->markAsRead();
        return $this->response(['message'=>'seen success']);
    }




}
