<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Mail\UserLiveInterviewMail;
use App\Mail\UserLiveInterviewUpdateMail;
use App\Mail\UserLiveInterviewDeleteMail;
use App\Mail\CompanyLiveInterviewMail;
use App\Mail\CompanyLiveInterviewUpdateMail;
use App\Mail\CompanyLiveInterviewDeleteMail;
use Illuminate\Support\Facades\Mail;

class LiveInterview extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'channel_name', 'userjob_id', 'declined', 'comment'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'from' => 'required|date_format:l d F Y - H:i|after_or_equal:tomorrow',
            'to' => 'required|date_format:l d F Y - H:i|after:from',
        ];
    }

    public function getToAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y H:i');
    }

    public function getFromAttribute($value)
    {
        return Carbon::parse($value)->format('l d F Y H:i');
    }

    public function setToAttribute($value)
    {
        $value = str_replace("-", "", $value);
        // $value = $value->format('Y-m-d H:i:s');

        $this->attributes['to'] = Carbon::parse($value)->toDateTimeString();
    }

    public function setFromAttribute($value)
    {
        $value = str_replace("-", "", $value);
        $this->attributes['from'] = Carbon::parse($value)->toDateTimeString();
    }

    public function userjob()
    {
        return $this->belongsTo('App\UserJob');
    }

    public function isExpire()
    {
        $now = Carbon::now()->toDateTimeString();
        $end_time = Carbon::parse($this->to)->toDateTimeString();

        return $now >= $end_time ? true : false;
    }

    public function isOpen()
    {
        $now = Carbon::now()->toDateTimeString();
        $start_time = Carbon::parse($this->from)->toDateTimeString();

        return $now >= $start_time ? true : false;
    }

    public function sendUserInterviewMail($oldData = null)
    {
        
        $user_name = $this->userjob->user->first_name;
        $user_email = $this->userjob->user->email;
        $job_title = $this->userjob->job->title;
        $company_name = $this->userjob->job->company->name;
        $from_date = $this->from;
        $interview_link = route('user.live.interview', $this->channel_name);
        $time = Carbon::parse($this->getOriginal('from'))->format('h:i A');

        $subject = "Jobadge Interview";

        $mail_data['user_name'] = $user_name;
        $mail_data['job_title'] = $job_title;
        $mail_data['company_name'] = $company_name;
        $mail_data['from_date'] = $from_date;
        $mail_data['interview_link'] = $interview_link;
        $mail_data['time'] = $time;
        if($oldData){
            $subject = "Jobadge change Interview";
            Mail::to($user_email)->send(new UserLiveInterviewUpdateMail($mail_data, $subject, $oldData));
        }else{
            Mail::to($user_email)->send(new UserLiveInterviewMail($mail_data, $subject));
        }

       
    }

    public function sendUserInterviewDeletedMail()
    {
        
        $user_name = $this->userjob->user->first_name;
        $user_email = $this->userjob->user->email;
        $job_title = $this->userjob->job->title;
        $company_name = $this->userjob->job->company->name;
        $from_date = $this->from;
        $interview_link = route('user.live.interview', $this->channel_name);
        $time = Carbon::parse($this->getOriginal('from'))->format('h:i A');

        $subject = "Jobadge Interview canceled";

        $mail_data['user_name'] = $user_name;
        $mail_data['job_title'] = $job_title;
        $mail_data['company_name'] = $company_name;
        $mail_data['from_date'] = $from_date;
        $mail_data['interview_link'] = $interview_link;
        $mail_data['time'] = $time;
        Mail::to($user_email)->send(new UserLiveInterviewDeleteMail($mail_data, $subject));

       
    }

    public function sendCompanyInterviewMail($oldData = null )
    {
        $user_name = $this->userjob->user->full_name;
        $job_title = $this->userjob->job->title;
        $company_email = $this->userjob->job->company->email;
        $company_name = $this->userjob->job->company->name;
        $from_date = $this->from;
        $interview_link = route('company.live.interview', $this->channel_name);
        $time = Carbon::parse($this->getOriginal('from'))->format('h:i A');

        $mail_data['user_name'] = $user_name;
        $mail_data['job_title'] = $job_title;
        $mail_data['company_name'] = $company_name;
        $mail_data['from_date'] = $from_date;
        $mail_data['interview_link'] = $interview_link;
        $mail_data['time'] = $time;

        $subject = "Jobadge Interview";
        if($oldData){
            $subject = "Jobadge change Interview";
            Mail::to($company_email)->send(new CompanyLiveInterviewUpdateMail($mail_data, $subject, $oldData));
        }else{
            Mail::to($company_email)->send(new CompanyLiveInterviewMail($mail_data, $subject));
        }
      
    }

    public function sendCompanyInterviewDeltedMail( )
    {
        $user_name = $this->userjob->user->full_name;
        $job_title = $this->userjob->job->title;
        $company_email = $this->userjob->job->company->email;
        $company_name = $this->userjob->job->company->name;
        $from_date = $this->from;
        $interview_link = route('company.live.interview', $this->channel_name);
        $time = Carbon::parse($this->getOriginal('from'))->format('h:i A');

        $mail_data['user_name'] = $user_name;
        $mail_data['job_title'] = $job_title;
        $mail_data['company_name'] = $company_name;
        $mail_data['from_date'] = $from_date;
        $mail_data['interview_link'] = $interview_link;
        $mail_data['time'] = $time;

        $subject = "Jobadge Interview canceled";
        Mail::to($company_email)->send(new CompanyLiveInterviewDeleteMail($mail_data, $subject));

      
    }
}
