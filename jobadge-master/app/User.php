<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\UserJob;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Follower;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\SendMail;
use App\Mail\UserStateChnageMail;
use App\Mail\UserApplicationApplyMail;
use App\Mail\UserRejectInterview;
use App\Mail\UserReject;
use Carbon\Carbon;
use App\Blog\Traits\commentBlogTrait;

class User extends Authenticatable
{
    use commentBlogTrait;   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'title', 'email', 'password', 'country_id', 'city_id', 'phone', 'cv', 'verified', 'image',
        'facebook_id', 'twitter_id', 'google_id', 'ref1_name', 'ref1_phone', 'ref1_title', 'ref2_name', 'ref2_phone', 'ref2_title',
        'suspend', 'no_of_views', 'no_of_shares', 'video_cv', 'age', 'gender', 'subscription', 'deactivate',
        'fcm_token', 'verify_code', 'nationality_id', "birth_date"
    ];

    // append new attribute to user (fullname)
    protected $appends = ['full_name', "has_still", "full_register","percentage of completing"];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPercentageOfCompletingAttribute()
    {
        return $this->getUserRate();
    }



    public function getFullRegisterAttribute()
    {
        return $this->cv && $this->nationality_id && $this->gender && $this->getOriginal('birth_date');
    }



    public function getCreateRules()
    {
        return [
            'first_name' => ['required', 'max:200'],
            'last_name' => ['required', 'max:200'],
            'title' => ['required', 'max:200'],
            'email' => 'required|email|max:190|unique:users,email',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'nationality_id' => 'nullable|exists:nationalities,id',
            'phone' => 'required|numeric|min:1,digits_between:1,11|unique:users,phone',
            // 'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/'],
            'password' => 'required|min:6',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10000',
            'gender' => 'nullable|in:male,female',
            'age' => 'nullable|numeric|min:16|digits_between:1,2'
        ];
    }

    public function getUpdateRules($id, $is_admin=false)
    {
        $user = self::find($id);
        $carbon = Carbon::now();
        $carbon->subYear(16);
        $carbon = $carbon->format("Y-m-d");
        $rules = [
            'first_name' => ['required', 'max:200'],
            'last_name' => ['required', 'max:200'],
            'title' => ['required', 'max:200'],
            'email' => 'required|email|max:190|unique:users,email,' . $id,
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'phone' => 'required|numeric|min:1,digits_between:1,11|unique:users,phone,' . $id,
            'gender' => 'required|in:male,female',
            // 'age' => 'required|numeric|min:16|digits_between:1,2',
            "birth_date" => "required|date|before_or_equal:$carbon",
            "cv" => 'nullable|mimes:pdf,doc,docx|max:10000',
        ];
      
      
        if (!$user->cv) {
            $rules['cv'] = 'required|mimes:pdf,doc,docx|max:10000';
        }
        if($is_admin){
            if( isset( $rules['cv'] )){
                $rules['cv'] = str_replace("required", "nullable" , $rules['cv']);
            }
        }
              

        return $rules;
    }

    public function loginRules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function validateRef1()
    {
        return [
            'ref1_name' => ['required', 'max:200', 'regex:/^([a-zA-Z ]+)$/'],
            'ref1_phone' => 'required|numeric|min:1|digits_between:1,11',
            'ref1_title' => 'required|max:200'
        ];
    }

    public function validateRef2()
    {
        return [
            'ref2_name' => ['required', 'max:200', 'regex:/^([a-zA-Z ]+)$/'],
            'ref2_phone' => 'required|numeric|min:1|digits_between:1,11',
            'ref2_title' => 'required|max:200'
        ];
    }

    public function validate_cv()
    {
        return [
            'cv' => 'required|mimes:pdf,doc,docx|max:10000'
        ];
    }

    public function validate_video_cv()
    {
        return [
            'video_cv' => 'required|mimes:mp4|max:6144',
        ];
    }

    public function validate_image()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
    }

    public function validateImportedExcel($id = null)
    {
        $rules = [
            'first_name' => 'required|max:250',
            // 'last_name' => ['required', 'max:200', 'regex:/^([a-zA-Z ]+)$/'],
            // 'title' => 'required|max:200',
            // 'country_id' => 'required|exists:countries,id',
            // 'city_id' => 'required|exists:cities,id',
            // 'nationality_id' => 'required|exists:nationalities,id',
            // 'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/'],
        ];
        if ($id) {
            array_push($rules, [
                // 'email' => 'required|max:250|unique:users,email,' . $id,
                // 'phone' => 'required|numeric|min:1,digits_between:1,11|unique:users,phone,' . $id,
            ]);
        } else {
            array_push($rules, [
                // 'email' => 'required|max:250|unique:users,email',
                // 'phone' => 'required|numeric|min:1,digits_between:1,11|unique:users,phone',
            ]);
        }

        return $rules;
    }

    public function password_validate()
    {
        return [
            // 'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed'],
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function validate_excel()
    {
        return [
            'file' => 'required|mimes:xlsx|max:4096',
        ];
    }

    public function getSendMailRules()
    {
        return [
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:254',
            'body' => 'required|textNoContainUrl|max:4000',
        ];
    }

    public function getUserImage()
    {
        return env('AWS_URL') . 'users/' . $this->image;
    }

    public function getUserCv()
    {
        return env('AWS_URL') . 'cvs/' . $this->cv;
    }

    public function getVideoCv()
    {
        return env('AWS_URL') . 'user_videos/' . $this->video_cv;
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function work_experiences()
    {
        return $this->hasMany('App\WorkExperience');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function languages()
    {
        return $this->hasMany('App\Language');
    }

    public function getAgeAttribute($value)
    {
        $now = Carbon::now();
        return  $now->diffInYears(Carbon::parse($this->birth_date));
    }

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }

    public function getSkillsForEdit()
    {
        $skills = '';

        foreach ($this->skills as $each_skill) {
            $skills = $skills . $each_skill->skill . ',';
        }

        return $skills;
    }

    public function certificates()
    {
        return $this->hasMany('App\Certificate');
    }

    public function target_job()
    {
        // return $this->hasOne('App\TargetJob');
        return $this->hasMany('App\TargetJob');
    }

    public function uploadUserImage($file)
    {
        // $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_image_path = env('AWS_URL') . 'users/';
        // if (!$file->move($new_image_path, $imageName)) {
        //     abort(500);
        // }
        $imageName = $file->store(
            'users',
            's3'
        );
        return basename($imageName);
    }

    public function deleteUserImage()
    {
        if ($this->image != 'user.png') {
            // $old_image = env('AWS_URL') . 'users/' . $this->image;
            // unlink($old_image);
            Storage::disk('s3')->delete('users/' . $this->image);
        }
    }

    public function uploadUserCv($file)
    {
        // $cv_name = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_cv_path = env('AWS_URL');
        // if (!$file->move($new_cv_path, $cv_name)) {
        //     abort(500);
        // }
        // $s3_url = $cv_name;
        $cv_name = $file->store(
            'cvs',
            's3'
        );
        return basename($cv_name);
    }

    public function deleteUserCv()
    {
        if ($this->cv) {
            // $old_cv = env('AWS_URL') . 'cvs/' . $this->cv;
            // unlink($old_cv);
            Storage::disk('s3')->delete('cvs/' . $this->cv);
        }
    }

    public function uploadVideoCv($file)
    {
        // $video_name = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_video_path = env('AWS_URL') . 'user_videos/';
        // if (!$file->move($new_video_path, $video_name)) {
        //     abort(500);
        // }
        // return $video_name;
        $video_name = $file->store(
            'user_videos',
            's3'
        );
        return basename($video_name);
    }

    public function deleteVideoCv()
    {
        if ($this->video_cv) {
            // $old_video = env('AWS_URL') . 'user_videos/' . $this->video_cv;
            // unlink($old_video);
            Storage::disk('s3')->delete('user_videos/' . $this->video_cv);
        }
    }

    public function checkSocialUser($social_user, $provider)
    {

        $user = $this->newQuery()->where([
            $provider . '_id' => $social_user->id,
        ]);

        if (isset($social_user->email)) {
            $user->orWhere('email', $social_user->email);
        }

        $user = $user->first();

        return $user;
    }

    public function createSocialUser($user, $provider)
    {
        $new_user = new self;
        $new_user->first_name = $user->name;
        $new_user->email = $user->email;
        $new_user->verified = 1;
        $new_user->save();

        $new_user->update([
            $provider . '_id' => $user->id,
        ]);

        return $new_user;
    }

    public function getUserApplications()
    {
        $applications = UserJob::where([
            'user_id' => $this->id,
        ])->whereHas('job', function ($query) {
            $query->activejob()->activecompany();
        })->latest()->paginate(10);

        return $applications;
    }

    public function generateShareLink($provider)
    {
        $link = route('user.get', $this->id);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . $this->title;
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $this->title;
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(404);
    }

    public function sendMail($data)
    {
        $user_email = $data->email;
        $user_message = $data->body;
        $user_name = $data->name;

        $mail_body = 'User Name : ' . $user_name . ' and my Email : ' . $user_email . ' Message : ' . $user_message;

        $email = 'info@jobadge.com';
        $subject = "Customer support";
        $headers = "From: " . $user_email;

        // mail($email, $subject, $mail_body, $headers);
        Mail::to($user_email)->send(new SendMail($mail_body, $subject));
    }

    public function activate()
    {
        if ($this->deactivate == 1) {
            $this->update(['deactivate' => 0]);
        }
    }

    public function sendStateNotification($title, $message)
    {
        if (!$this->fcm_token) {
            return;
        }

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(3600);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($message)
            ->setSound('default')->setIcon(asset('site/images/logo/logo.png'));

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();

        $token = $this->fcm_token;

        $downstreamResponse = FCM::sendTo($token, $option, $notification);

        return $downstreamResponse->numberSuccess() == 1 ? true : false;

        // $downstreamResponse->numberSuccess();
        // $downstreamResponse->numberFailure();
        // $downstreamResponse->numberModification();

        // //return Array - you must remove all this tokens in your database
        // $downstreamResponse->tokensToDelete();

        // //return Array (key : oldToken, value : new token - you must change the token in your database )
        // $downstreamResponse->tokensToModify();

        // //return Array - you should try to resend the message to the tokens in the array
        // $downstreamResponse->tokensToRetry();
    }

    public function isApplied($job_id)
    {
        $user_job = UserJob::where([
            'user_id' => $this->id,
            'job_id' => $job_id
        ])->first();

        return $user_job ? true : false;
    }

    public function isActivated()
    {
        return $this->verified == 1 && $this->suspend == 0 && $this->deactivate == 0 ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->where([
            'deactivate' => 0,
            'suspend' => 0,
            'verified' => 1
        ]);
    }

    public function UserFollowCompany($company_id)
    {
        $user = auth()->guard('user')->user();

        $follower = Follower::where([
            'user_id' => $user->id,
            'company_id' => $company_id,
            'type' => 'user'
        ])->first();

        return $follower ? true : false;
    }

    public function validateNewPassword()
    {
        return [
            'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed'],
            'old_password' => 'required'
        ];
    }

    /*
    *  @author Ahmed Safwat
    *  Custm message function for password
    *  @return []  
    */
    public function getChangePasswordRules()
    {
        return [
            "password.regex" => "The password must be Strong Password ."
        ];
    }

    public function getDrafts()
    {
        return $this->hasMany('App\Job')->where('draft', 1);
    }

    public function IfSocialUser()
    {
        return $this->google_id || $this->facebook_id || $this->twitter_id || $this->linkedin_id ? true : false;
    }

    public function getUserRate()
    {
        $rate = 5;

        if ($this->first_name && $this->last_name && $this->phone && $this->phone && $this->email && $this->gender && $this->getOriginal('birth_date') && $this->cv) {
            $rate += 30;
        }

        // if ($this->cv) {
        //     $rate += 10;
        // }
        if ($this->image != 'user.png') {
            $rate += 5;
        }

        if (count($this->work_experiences) > 0) {
            $rate += 15;
        }

        if (count($this->skills) > 0) {
            $rate += 10;
        }

        if (count($this->target_job) > 0) {
            $rate += 5;
        }

        if (count($this->educations) > 0) {
            $rate += 10;
        }

        if ($this->video_cv) {
            $rate += 10;
        }

        if (count($this->certificates) > 0) {
            $rate += 5;
        }

        if ($this->ref1_name || $this->ref2_name) {
            $rate += 5;
        }

        return $rate;
    }

    public function sendStateMail($body)
    {
        $email = $this->email;
        $subject = "Jobadge Application State";

        $headers = "From: info@jobadge.com";

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }

    public function sendStateMailV2($job)
    {
        $email = $this->email;
        $subject = "Jobadge Application State";

        $headers = "From: info@jobadge.com";

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new UserStateChnageMail($job, $subject));
    }

    public function sendUserApplicationApply($job){
        $email = $this->email;
        $subject = "Jobadge Application application apply";

        $headers = "From: info@jobadge.com";

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new UserApplicationApplyMail($job, $subject));
    }

    public function sendUserRefusing($job){
        $email = $this->email;
        $subject = "Reject Application";

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new UserReject($job, $subject));
    }

    public function sendUserRefusingInterview($job){
        $email = $this->email;
        $subject = "Interview Result";
        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new UserRejectInterview($job, $subject));
    }

    public function getSummaryForShare()
    {
        $summary = '';
        $summary = $summary . $this->title . ': ';

        foreach ($this->skills as $each_skill) {
            $summary = $each_skill->skill . ' ';
        }

        return $summary;
    }

    public function sendMailToVerify($email, $first_name, $code)
    {
        $email = $email;
        $subject = "Jobadge Verification";

        $headers = "From: info@jobadge.com";

        $body = "<html><body>Dear " . $first_name . ",
        <br><br>Welcome! Thank you for Signing up on Jobadge Website.<br>
        <br>To take the next step, please activate your account by clicking on the link below to confirm your email address.<br>
        <br><a href='" . route('user.verify', $code) . "'>Activate email address</a><br>
        <br>Regards,
        <br>Jobadge</body></html>";

        $headers .= " MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }

    /* 
    *   author safwat 
    *   CHEKC if user have another experice still now
    *   @return true or flase
    */
    function getHasStillAttribute()
    {
        $check = $this->work_experiences()->where("till_present", "1")->first();
        return !is_null($check);
    }
}
