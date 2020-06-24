<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'education_level', 'gender', 'nationality_id', 'experience_years', 'description', 'job_requirement', 'KPI', 'category_id',
        'skills', 'benefits', 'vacancies', 'company_id', 'jobtype_id', 'joblevel_id', 'apply_on_site',
        'company_url', 'draft', 'close', 'confidential', 'travel_frequency', 'salary_from', 'salary_to', 'approve',
        'salary_period', 'salary_hidden', 'slug',"job_location",'country_id','city_id','created_at'
        ,"time_created"
    ];

    protected $dates = [
        'time_created',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }


    public function city()
    {
        return $this->belongsTo('App\City');
    }


    public function getCreateAndUpdatesRules()
    {
        return [
            'title' => 'required|max:200',
            'education_level' => 'required|max:200',
            'gender' => 'required|in:only males,only females,males preferred,females preferred,no preference',
            'nationality_id' => 'required|exists:nationalities,id',
            'experience_years' => ['required', 'max:5', 'regex:/^[0-9+-<>]+$/'],
            'description' => 'required|max:10000',
            'job_requirement' => 'required|max:10000',
            'category_id' => 'required|exists:categories,id',
            'skills' => 'required|max:10000',
            'benefits' => 'required|max:10000',
            'vacancies' => 'required|numeric|min:1|digits_between:1,2',
            'joblevel_id' => 'required|exists:job_levels,id',
            'jobtype_id' => 'required|exists:job_types,id',
            'salary_from' => 'required|numeric|digits_between:1,10',
            'salary_to' => 'required|numeric|digits_between:1,10',
            'salary_period' => 'required|in:per hour,per day,per week,per month,per year',
            'company_id' => 'required|exists:companies,id',
            "job_location"=>"nullable",
            'country_id'  => 'nullable|exists:countries,id',
            'city_id'    => 'required_with:country_id|exists:cities,id',
            'travel_frequency' => 'required|in:none,minimal travel,up to 25% travel,up to 50% travel,up to 75% travel,up to 100% travel',
        ];
    }

    public function getSiteJobRule($salary_to)
    {
        $max_salary = $salary_to - 1;
        return [
            'title' => 'required|max:200',
            'education_level' => 'required|max:200',
            'gender' => 'required|in:only males,only females,males preferred,females preferred,no preference',
            'nationality_id' => 'required|exists:nationalities,id',
            'experience_years' => ['required', 'max:5', 'regex:/^[0-9+-<>]+$/'],
            'description' => 'required|max:10000',
            'job_requirement' => 'required|max:10000',
            'category_id' => 'required|exists:categories,id',
            'skills' => 'required|max:10000',
            'benefits' => 'required|max:10000',
            'vacancies' => 'required|numeric|min:1|digits_between:1,2',
            'joblevel_id' => 'required|exists:job_levels,id',
            'salary_to' => 'required|numeric|digits_between:1,10',
            'salary_from' => 'required|numeric|digits_between:1,10|max:' . $max_salary,
            'salary_period' => 'required|in:per hour,per day,per week,per month,per year',
            'jobtype_id' => 'required|exists:job_types,id',
            'travel_frequency' => 'required|in:none,minimal travel,up to 25% travel,up to 50% travel,up to 75% travel,up to 100% travel',
        ];
    }

    public function validateImportedExcel()
    {
        return [
            'title' => 'required|max:200',
            'education_level' => 'required|max:200',
            'gender' => 'required|in:only males,only females,males preferred,females preferred,no preference',
            'nationality_id' => 'required|exists:nationalities,id',
            'experience_years' => ['required', 'max:5', 'regex:/^[0-9+-<>]+$/'],
            'description' => 'required|max:10000',
            'job_requirement' => 'required|max:10000',
            'category_id' => 'required|exists:categories,id',
            'skills' => 'required|max:10000',
            'benefits' => 'required|max:10000',
            'vacancies' => 'required|numeric|min:1|digits_between:1,2',
            'joblevel_id' => 'required|exists:job_levels,id',
            'jobtype_id' => 'required|exists:job_types,id',
            'company_id' => 'required|exists:companies,id',
            'salary_from' => 'required|numeric|digits_between:1,10',
            'salary_to' => 'required|numeric|digits_between:1,10',
            'salary_period' => 'required|in:per hour,per day,per week,per month,per year',
            'travel_frequency' => 'required|in:none,minimal travel,up to 25% travel,up to 50% travel,up to 75% travel,up to 100% travel',
        ];
    }

    public function validate_excel()
    {
        return [
            'file' => 'required|mimes:xlsx|max:2048',
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    public function jobtype()
    {
        return $this->belongsTo('App\JobType');
    }

    public function joblevel()
    {
        return $this->belongsTo('App\JobLevel');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function job_users()
    {
        return $this->hasMany('App\UserJob');
    }

    public function getCvs()
    {
        $job_users = $this->job_users;

        $cvs = array();

        foreach ($job_users as $job_user) {
            $user = $job_user->user;
            if ($user->cv) {
                array_push($cvs, [
                    'cv' => env('AWS_URL') . 'cvs/' . $user->cv,
                    'name' => $user->cv,
                    'title' => $job_user->job->title,
                    'job_user' => $job_user,
                    'user_id' => $user->id,
                    'user_name' => $job_user->user->full_name,
                    'live_interview' => $job_user->live_interview,
                    'live_interview_expire' => $job_user->live_interview ? $job_user->live_interview->isExpire() : false,
                    'record_interview' => $job_user->record_interview,
                    'record_interview_expire' => $job_user->record_interview ? $job_user->record_interview->isExpire() : false,
                    'record' => $job_user->record_interview['user_video'] ? $job_user->record_interview->getRecord() : '',
                ]);
            }
        }

        return $cvs;
    }

    public function scopeActiveCompany($query)
    {
        return $query->whereHas('company', function ($query) {
            $query->where('deactivate', 0)
                ->where('suspend', 0)
                ->where('verified', 1);
        });
    }

    public function scopeActiveJob($query)
    {
        return $query->where([
            'draft' => 0,
            'close' => 0,
            'approve' => 1
        ]);
    }

    public function getRelatedJobs()
    {
        $job = $this;
        $jobs = $this->activejob()->activecompany()->where('id', '!=', $this->id)
            ->where(function ($query) use ($job) {
                $query->where('title', 'LIKE', '%' .  $job->title . '%')
                    ->orWhere('category_id', $job->category_id)
                     ->orWhere('jobtype_id', $job->jobtype_id)
                     ->orWhere('joblevel_id', $job->joblevel_id);
            })->latest()->take(4)->get();

        return $jobs;
    }

    public function PaginateResults($search_data)
    {
        // implement the pagination of the search result
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($search_data);
        $perPage = 10;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $results = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

        // set path to pagination
        $path = route('user.index') . '/' . request()->path();
        $results->setPath($path);

        return $results;
    }

    public function validate_salary($from, $to)
    {
        if ($to < $from) {
            return false;
        }
        return true;
    }

    public function validate_kpi()
    {
        return [
            'KPI' => 'required|max:10000',
        ];
    }

    public function generateShareLink($provider)
    {
        $link = route('user.get.job', $this->slug);

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
    
    public function user_views()
    {
        return $this->hasMany('App\User_views','job_id');
    }

    public function sendInvitation($user)
    {
        $email = $user->email;
        $subject = "Jobadge invitation";

        $headers = "From: info@jobadge.com";
        $body = $this->company->name . 'has sent you an invitation to apply for this job ' . route('user.get.job', $this->slug);

        // mail($email, $subject, $body, $headers);
        Mail::to($email)->send(new SendMail($body, $subject));
    }
}
