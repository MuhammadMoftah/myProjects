<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Blog\Traits\commentBlogTrait;

class Company extends Authenticatable
{
    use commentBlogTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password', 'country_id', 'city_id',
        'phone', 'verified', 'image', 'description', 'facebook', 'twitter', 'linked_in', 'URL', 'package_id', 'suspend',
        'size_id', 'industry_id', 'lat', 'lng', 'subscription', 'video',
        'facebook_id', 'twitter_id', 'google_id', 'logo', 'deactivate', 'cr_logo', 'verify_code', 'address', 'slug'
    ];

    public function getCreateRules()
    {
        // 'regex:/\b[\w\.-]+@((?!gmail|googlemail|yahoo|hotmail|outlook|MSN).)[\w\.-]+\.\w{2,4}\b/'
        $rules = [
            'first_name' => ['required', 'max:200'],
            'last_name' => ['required', 'max:200'],
            'name' => 'required|max:200',
            'email' => ['required', 'email', 'regex:/\b[\w\.-]+@((?!gmail|googlemail|yahoo|hotmail|outlook|MSN).)[\w\.-]+\.\w{2,}\b/', 'max:190', 'unique:companies,email'],
            'description' => 'required|max:4000',
            'url' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|numeric|min:1,digits_between:1,11|unique:companies,phone',
            'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed'],
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:4096',
            'size_id' => 'required|exists:sizes,id',
            'industry_id' => 'required|exists:industries,id',
            // 'lat' => 'required',
            // 'lng' => 'required'
        ];

        request('address') ? $rules['address'] = 'required|max:400' : '';

        return $rules;
    }

    public function getUpdateRules($id)
    {
        $rules = [
            'email' => ['required', 'email', 'regex:/\b[\w\.-]+@((?!gmail|googlemail|yahoo|hotmail|outlook|MSN).)[\w\.-]+\.\w{2,4}\b/', 'max:190', 'unique:companies,email,' . $id],
            'first_name' => ['required', 'max:200', 'regex:/^([a-zA-Z ]+)$/'],
            'last_name' => ['required', 'max:200', 'regex:/^([a-zA-Z ]+)$/'],
            'name' => 'required|max:200',
            'description' => 'required|max:4000',
            'url' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|numeric|min:1,digits_between:1,11|unique:companies,phone,' . $id,
            'size_id' => 'required|exists:sizes,id',
            'industry_id' => 'required|exists:industries,id',
            // 'lat' => 'required',
            // 'lng' => 'required'
        ];

        request('address') ? $rules['address'] = 'required|max:400' : '';

        return $rules;
    }

    public function validatePackage()
    {
        return [
            'package_id' => 'required|exists:packages,id'
        ];
    }

    public function validate_video()
    {
        return [
            'video' => 'required|mimes:mp4|max:6144'
        ];
    }

    public function validate_facebook()
    {
        return [
            'facebook' => 'required|url',
        ];
    }

    public function validate_twitter()
    {
        return [
            'twitter' => 'required|url',
        ];
    }

    public function validate_linkedin()
    {
        return [
            'linked_in' => 'required|url',
        ];
    }

    public function validate_logo()
    {
        return [
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }

    public function validate_cr()
    {
        return [
            'cr_logo' => 'required|mimes:pdf|max:10240',
        ];
    }

    public function password_validate()
    {
        return [
            'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed'],
        ];
    }

    public function validate_excel()
    {
        return [
            'file' => 'required|mimes:xlsx|max:10240',
        ];
    }

    public static function validateImportedExcel($id = null)
    {
        $rules = [
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'name' => 'required|max:200',
            'description' => 'required|max:4000',
            'url' => 'required|url',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/'],
            'package_id' => 'required|exists:packages,id',
            'size_id' => 'required|exists:sizes,id',
            'industry_id' => 'required|exists:industries,id',
            'lat' => 'required',
            'lng' => 'required'
        ];
        if ($id) {
            array_push($rules, [
                'email' => 'required|max:190|unique:companies,email,' . $id,
                'phone' => 'required|numeric|min:1,digits_between:1,11|unique:companies,phone,' . $id,
            ]);
        } else {
            array_push($rules, [
                'email' => 'required|max:190|unique:companies,email',
                'phone' => 'required|numeric|min:1,digits_between:1,11|unique|companies,phone',
            ]);
        }

        return $rules;
    }

    public function validateLatitude($lat)
    {
        return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $lat);
    }

    public function validateLongitude($lng)
    {
        return preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $lng);
    }

    public function getCompanyLogo()
    {
        return env('AWS_URL') . 'companies/' . $this->logo;
    }

    public function getCompanyVideo()
    {
        return env('AWS_URL') . 'companies_videos/' . $this->video;
    }

    public function getCompanyCr()
    {
        return env('AWS_URL') . 'crs/' . $this->cr_logo;
    }

    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function partners()
    {
        return $this->hasMany('App\CompanyPartner');
    }

    public function uploadCompanyLogo($file)
    {
        // $logoName = uniqid() . '.' . $file->getClientOriginalExtension();
        // // $new_logo_path = env('AWS_URL')  . 'companies/';
        // if (!$file->move($new_logo_path, $logoName)) {
        //     abort(500);
        // }
        $logoName = $file->store(
            'companies',
            's3'
        );
        return basename($logoName);
    }

    public function deleteCompanyLogo()
    {
        if ($this->logo != 'company.png') {
            // $old_logo = env('AWS_URL')  . 'companies/' . $this->logo;
            // unlink($old_logo);
            Storage::disk('s3')->delete('companies/' . $this->logo);
        }
    }

    public function uploadCompanyCr($file)
    {
        // $crName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_cr_path = env('AWS_URL')  . 'crs/';
        // if (!$file->move($new_cr_path, $crName)) {
        //     abort(500);
        // }
        // return $crName;
        $crName = $file->store(
            'crs',
            's3'
        );
        return basename($crName);
    }

    public function deleteCompanyCr()
    {
        if ($this->cr_logo) {
            // $old_cr_logo = env('AWS_URL')  . 'crs/' . $this->cr_logo;
            // unlink($old_cr_logo);
            Storage::disk('s3')->delete('crs/' . $this->cr_logo);
        }
    }

    public function uploadCompanyVideo($file)
    {
        $video_name = uniqid() . '.' . $file->getClientOriginalExtension();
        $new_video_path = env('AWS_URL')  . 'companies_videos/';
        if (!$file->move($new_video_path, $video_name)) {
            abort(500);
        }
        return $video_name;
    }

    public function deleteCompanyVideo()
    {
        if ($this->video) {
            // $old_video = env('AWS_URL')  . 'companies_videos/' . $this->video;
            // unlink($old_video);
            Storage::disk('s3')->delete('companies_videos/' . $this->video);
        }
    }

    public function generateShareLink($provider)
    {
        $link = route('user.company.get', $this->slug);

        if ($provider == 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
        }

        if ($provider == 'twitter') {
            return 'https://www.twitter.com/intent/tweet?url=' . $link . '&text=' . $this->name;
        }

        if ($provider == 'linkedin') {
            return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $this->name;
        }

        if ($provider == 'tumblr') {
            return 'https://www.tumblr.com/share/link?url=' . $link;
        }

        abort(500);
    }

    public function loginRules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function activate()
    {
        if ($this->deactivate == 1) {
            $this->update(['deactivate' => 0]);
        }
    }

    public function getInvitationRules()
    {
        return [
            "emails" => "required|array|min:1",
            "emails.*" => "required|email|distinct",
        ];
    }

    public function sendInvite($emails)
    {
        foreach ($emails as $email) {

            $subject = "Jobadge Invitation link";
            $headers = "From: info@jobadge.com";
            $body = 'Invitation link: ' . route('user.login.get');

            mail($email, $subject, $body, $headers);
        }
    }

    public function getOpenPositions()
    {
        return $this->hasMany('App\Job')->where([
            'close' => 0,
            'draft' => 0,
            'approve' => 1
        ])->latest();
    }

    public function isActivated()
    {
        return $this->verified == 1 && $this->suspend == 0 && $this->deactivate == 0 && $this->approved == 1 ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->where([
            'deactivate' => 0,
            'suspend' => 0,
            'verified' => 1
        ]);
    }

    public function validateNewPassword()
    {
        return [
            'password' => ['required', 'min:8', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed'],
            'old_password' => 'required'
        ];
    }

    public function getDrafts()
    {
        return $this->hasMany('App\Job')->where('draft', 1);
    }

    public function sendMailToVerify($email, $first_name, $code)
    {
        $subject = "Jobadge Verification";

        $headers = "From: info@jobadge.com";

        $body = "<html><body>Hi " . $first_name . ",<br>
        <br>Thanks for joining us. To start the hiring plan kindly Click the button below to verify your email address.<br>
        <br><a href='" . route('user.verify', $code) . "'>Verify email address</a><br>
        <br>You're receiving this email because you recently created a new Jobadge account or added a new email address. If this wasn't you, please ignore this email.<br>
        <br>Regards,<br>
        Jobadge</body></html>";

        $headers .= " MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }

    public function getCompanyDefaultLogo()
    {
        return env('AWS_URL') . 'companies/' . 'company.png';
    }

    public function sendApplicationMail($user, $job)
    {
        $email = $this->email;
        $subject = "Job Seeker Application";

        $headers = "From: info@jobadge.com";
        $body = 'Jobseeker Apply to this job : ' . route('user.get.job', $job->slug) . ' and his/her pofile: ' . route('company.jobseeker.view', $user->id);

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }

    public function sendDeclineEmail($comment, $job)
    {
        $email = $this->email;
        $subject = "Live Interview Declined";

        $headers = "From: info@jobadge.com";
        $body = 'job seeker declined your live interview for job: ' . $job->title . 'and his/her reason : ' . $comment;

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }

    public function getUrlAtrribute()
    {
        if (strpos($this->URL, 'https') !== 0 && strpos($this->URL, 'http') !== 0) {
            return '//' . $this->URL;
        }
        return $this->URL;
    }
}
