<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\User;
use App\ForgetPassword;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;

class ForgetPasswordService
{
    private $user_model;
    private $forget_model;
    private $request;

    public function __construct(User $user_model, ForgetPassword $forget_model, Request $request)
    {
        $this->user_model = $user_model;
        $this->request = $request;
        $this->forget_model = $forget_model;
    }

    public function getUserByEmail()
    {
        return $this->user_model->where(['email' => $this->request->email])->first();
    }

    public function checkIfUserHasForget($user_id)
    {
        return $this->forget_model->where('user_id', $user_id)->first();
    }

    public function checkForValidToken($token)
    {
        return $this->forget_model->where('token', $token)->firstOrFail();
    }

    public function storeForgetPassword($user)
    {
        $forget_user = $this->checkIfUserHasForget($user->id);

        if ($forget_user) {
            $this->sendForgetMail($forget_user);
        } else {

            $token = bin2hex(random_bytes(20));

            $forget_user = $this->forget_model->create([
                'user_id' => $user->id,
                'token' => $token
            ]);
            $this->sendForgetMail($forget_user);
        }
    }

    public function sendForgetMail($forget_user)
    {
        $email = $forget_user->user->email;
        $subject = "Yalla-Furnish Forget Password";
        $mail_body = 'please click this link to change your password ' . route('user.newpassword.get', $forget_user->token);
        Mail::to($email)->send(new ForgetPasswordMail($mail_body, $subject));
    }

    public function setNewPassword($forget_user)
    {
        $forget_user->user->update([
            'password' => $this->request->password
        ]);
    }
}
