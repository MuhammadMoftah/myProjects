<?php

namespace App\Http\Controllers\Api;

use Mail;
use Auth;
use Config;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WebService\Response;
use App\WebService\ValidationBuilder;

class BaseController extends Controller
{

    use Response,ValidationBuilder;


    public $auth;

    function __construct()
    {
       $this->middleware(function($request, $next){
            $this->auth = Auth::guard('api')->user();
            config()->set('app.locale',request('locale'));
            return $next($request);
        });
    }

    /**
     * send message for phone number
     * @param  integer $mobile    Phone number
     * @param  String $message   Message
     * @param  string $site_name [empty String]
     * @return Avoid
     */
    public function sendSms($mobile, $message,$site_name = '')
    {
        // this line is required if you send message in url (ex: mobily.ws)
        $message = str_replace(' ', '+', $message);
        if ($mobile[0] == 0) {
            $mobile = substr($mobile,1);
        }
        $mobile = '966'.$mobile;

        // $sms = file_get_contents("http://www.mobily.ws/api/msgSend.php?mobile=966555259728&password=kdjskl3dsfds&numbers=$mobile&sender=Zan&msg=$message&timeSend=0&lang=3&dateSend=0&applicationType=24&domainName=$site_name");
    }

    public function sendMail($email, $subject, $content)
    {
        Mail::raw($content, function ($message) use($email, $subject, $content) {
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->to($email);
            $message->subject($subject);
        });
        // $headers = "From: me@markrady.com \r\n" ;
        // $headers .= "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        // mail($email, $subject ,$content, $headers);
    }

}
