<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;

class ForgetPassword extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'token'
    ];

    public function getSendMailValidate()
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function getChangePasswordRules()
    {
        return [
            'password' => ['required', 'min:8', 'Regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed']
        ];
    }

    public function getChangePasswordErrors()
    {
        return [
            'password.regex' => 'The password must contain one capital letter and one small letter and one number atleast',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'user_id');
    }

    public function sendMailToUser($token)
    {
        $forget = $this->where([
            'token' => $token,
        ])->firstOrFail();

        $email = $forget->type == 'user' ? $forget->user->email : $forget->company->email;
        $subject = "Jobadge Forget Password";
        $link   =  route('user.newpassword.get', $token);

        Mail::to($email)->send(new ForgetPasswordMail($link , $subject));
    }
}
