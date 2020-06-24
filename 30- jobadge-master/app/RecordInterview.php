<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Mail; 
use App\Mail\SendMail;

class RecordInterview extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'channel_name', 'userjob_id', 'question1', 'question2', 'question3', 'user_video'
    ];

    public function getCreateAndUpdateRules()
    {
        return [
            'from' => 'required|date_format:l d F Y - H:i|after_or_equal:tomorrow',
            'to' => 'required|date_format:l d F Y - H:i|after:from',
            'question1' => 'required|max:200',
        ];
    }

    public function validateQ2()
    {
        return [
            'question2' => 'required|max:200',
        ];
    }

    public function validateQ3()
    {
        return [
            'question3' => 'required|max:200',
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

    public function uploadRecord($file)
    {
        // $video_name = uniqid() . '.' . $file->getClientOriginalExtension();
        // $new_video_path = env('AWS_URL') . 'records/';
        // if (!$file->move($new_video_path, $video_name)) {
        //     abort(500);
        // }
        // return $video_name;
        
        $video_name = $file->store(
            'records',
            's3'
        );
        return basename($video_name);  
    }

    public function deleteRecord()
    {
        if ($this->user_video) {
            // $old_video = env('AWS_URL') . 'records/' . $this->user_video;
            // unlink($old_video);
            Storage::disk('s3')->delete('records/' . $this->user_video);
        }
    }

    public function getRecord()
    {
        return env('AWS_URL') . 'records/' . $this->user_video;
    }

    public function validateVideo()
    {
        return [
            'video' => 'required|max:12288',
        ];
    }

    public function sendUserInterviewMail()
    {
        $user_name = $this->userjob->user->full_name;
        $user_email = $this->userjob->user->email;
        $job_title = $this->userjob->job->title;
        $company_name = $this->userjob->job->company->name;

        $mail_body = 'Congratulations! ' . $user_name . ' you have a record interview as: ' . $job_title . ' at: ' . $company_name .
            ' from ' . $this->from . ' to ' . $this->to . ' at this link ' . route('user.record.interview', $this->channel_name) . ' GoodLuck';

        $email = 'info@jobadge.com';
        $subject = "Jobadge Interview";
        $headers = "From: " . $email;

        // mail($user_email, $subject, $mail_body, $headers);
        Mail::to($user_email)->send(new SendMail($$mail_body, $subject));
    }
}
