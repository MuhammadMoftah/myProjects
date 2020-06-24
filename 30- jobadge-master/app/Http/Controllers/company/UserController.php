<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;
use App\LiveInterview;
use Carbon\Carbon;
use App\UserJob;
use App\User;
use Smalot\PdfParser\Parser;
use Storage;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getApplicant($job_id, $userjob_id, Job $job_model, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $job = $job_model->where([
            'id' => $job_id,
            'company_id' => $company->id
        ])->firstOrFail();

        $user_job = $userjob_model->where([
            'job_id' => $job->id,
            'id' => $userjob_id
        ])->firstOrFail();

        $user_job->update([
            'view_state' => Carbon::now()
        ]);

        $applicant = $user_job->user;

        return $applicant;
    }

    public function qualifyState($userjob_id, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $userJob = $userjob_model->findOrFail($userjob_id);

        if ($userJob->job->company->id != $company->id) {
            abort(404);
        }

        $userJob->update([
            'qualified_state' => Carbon::now(),
            'shortlist_state' => null,
            'reject_state' => null,
            'reason' => null
        ]);

        $email_body = 'Dear ' . $userJob->user->first_name . ',
        We appreciate your interest in ' . $userJob->job->company->name . ' and the time you’ve invested in applying for the ' . $userJob->job->title . '.We are reaching back to you happy to inform you that you have been accepted in the first interview.After the first interview, we got the chance to know you better, and understand your characteristics,goals and ambitious.Best of Luck,' . $userJob->job->company->name;

        $userJob->user->sendStateNotification($userJob->job->title, 'Hi,' . $userJob->user->full_name . '<br>This is your application Status:Qualified');
        $userJob->user->sendStateMailV2($userJob);

        return back()->withMessage('this applicant set to qualified state');
    }

    public function shortListState($userjob_id, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $userJob = $userjob_model->findOrFail($userjob_id);

        if ($userJob->job->company->id != $company->id) {
            abort(404);
        }

        $userJob->update([
            'shortlist_state' => Carbon::now(),
            'qualified_state' => null,
            'reject_state' => null,
            'reason' => null
        ]);

        $userJob->user->sendStateNotification($userJob->job->title, 'Hi,' . $userJob->user->full_name . '<br>This is your application Status:Shortlisted');

        return back()->withMessage('this applicant set to shortlist state');
    }

    public function rejectState($userjob_id, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $userJob = $userjob_model->with(['user','job.company'])->findOrFail($userjob_id);

        if ($userJob->job->company->id != $company->id) {
            abort(404);
        }

        $this->validate($this->request, ['reason' => 'required|in:location,over_qualified,not_qualified']);

        $userJob->update([
            'reject_state' => Carbon::now(),
            'qualified_state' => null,
            'shortlist_state' => null,
            'reason' => $this->request->reason
        ]);

        $userJob->user->sendStateNotification($userJob->job->title, 'Hi,' . $userJob->user->full_name . '<br> This is your application Status:Rejected for ' . $this->request->reason);
        if(request()->type == "screen"){
            $userJob->user->sendUserRefusing($userJob);
        }    
        return back()->withMessage('this applicant set to reject state');
    }

    public function getCVs(Job $job_model)
    {
        $company = auth()->guard('company')->user();
        $jobs = $company->jobs;
        $cvs = array();

        foreach ($jobs as $job) {
            $job_cvs = $job->getCvs();
            $cvs = array_merge($cvs, $job_cvs);
        }

        if ($this->request->keyword) {
            $PDFParser = new Parser();
            $filtered_cvs = array();

            foreach ($cvs as $cv) {
                $pdf = $PDFParser->parseFile($cv['cv']);
                $content = $pdf->getText();
                if (strpos($content, $this->request->keyword)) {
                    array_push($filtered_cvs, $cv);
                }
            }
        }


        if ($this->request->keyword) {
            $cvs = $job_model->PaginateResults($filtered_cvs);
        } else {
            $cvs = $job_model->PaginateResults($cvs);
        }

        return view('company.pages.cvs', compact('cvs', 'company'));
    }
    

    public function searchJobSeekers(User $user_model)
    {
        $users = $user_model->newQuery();

        if (isset($this->request->title)) {
            $users->where('title', 'LIKE', '%' . $this->request->title . '%')
                   ->orWhereHas("work_experiences", function($query) use(&$request){
                        $query->where('title', 'LIKE', '%' . $this->request->title . '%')
                              ->orWhere('job_description', 'LIKE', '%' . $this->request->title . '%');
                   });
            $users = $users->active()->paginate(10);
        } else {
            $users = [];
        }

        return view('company.pages.jobseekers', compact('users'));
    }

    public function viewCv($userjob_id, UserJob $userJob_model)
    {
        $user_job = $userJob_model->findOrFail($userjob_id);

        $cv_link = $user_job->user->getUserCv();

        $user_job->update([
            'view_state' => Carbon::now()
        ]);

        return view('company.pages.viewCv', compact('cv_link'));
    }

    public function downloadCv($cv_name)
    {
        clearstatcache();
        $cv_path =  'cvs/' . $cv_name;
        if (!Storage::disk('s3')->exists($cv_path)) {
            abort(404);
        }
        return Storage::disk('s3')->download($cv_path,'cv.pdf');
    }

    public function getJobSeeker($id, User $user_model, Job $job_model)
    {
        $user = $user_model->active()->where(['id' => $id])->firstOrFail();
        $user->increment('no_of_views');

        $company = auth()->guard('company')->user();

        $active_jobs = $job_model->where([
            'company_id' => $company->id
        ])->activejob()->latest()->get();

        return view('company.pages.jobseekerProfile', compact('user', 'active_jobs'));
    }

    public function getArrangeInterview($userjob_id, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $user_job = $userjob_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->firstOrFail();

        if ($user_job->live_interview || $user_job->record_interview) {
            return back()->withErrors('you already arranged interview for this application');
        }

        if (!$user_job->qualified_state) {
            return back()->withErrors('this user is not qualified for any interview yet');
        }

        return view('company.pages.arrangeInterview', compact('userjob_id'));
    }


    public function viewDetailLiveInterview(LiveInterview $live){
        $live->load(['userjob.user',"userjob.job.company"]);
        if($live->userjob->job->company->id != auth('company')->id()){   
            abort(404);
        }
        if (!$live->userjob->qualified_state) {
            return back()->withErrors('this user is not qualified for any interview yet');
        }
        if($live->userjob->record_interview){
            return back()->withErrors('you already arranged interview for this application');
        }
       
        return view('company.pages.liveInterviewDetails', compact('live'));
      
    }

    public function updateLiveInterview(LiveInterview $live){
        $this->validate($this->request, $live->getCreateAndUpdateRules());
       
        $live->load(['userjob.user',"userjob.job.company"]);
        if($live->userjob->job->company->id != auth('company')->id()){   
            return redirect()->back()->withErrors("User can't perform this actions");
        }
        $oldDate['from']  = $live->from;
        $oldDate['to']    = $live->to  ;
        $live->from = $this->request->from;
        $live->to = $this->request->to;
        if (!$live->save()) {
            abort(500);
        }

        //test

        $live->sendUserInterviewMail($oldDate);
        $live->sendCompanyInterviewMail($oldDate);
        return redirect()->route('company.cvs.get')->withMessage('Live interview arranged successfully');
      
    }

    public function deleteLiveInterview(LiveInterview $live){
        
       
        $live->load(['userjob.user',"userjob.job.company"]);
        if($live->userjob->job->company->id != auth('company')->id()){   
            return redirect()->back()->withErrors("User can't perform this actions");
        }
      
        $live->sendUserInterviewDeletedMail();
        $live->sendCompanyInterviewDeltedMail();

        $live->delete();

        return redirect()->route('company.cvs.get')->withMessage('Live interview Deleted successfully');
      
    }

    public function deleteCv($userjob_id, UserJob $userjob_model)
    {
        $company = auth()->guard('company')->user();

        $user_job = $userjob_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->firstOrFail();

        if ($user_job->live_interview) {
            $user_job->live_interview->delete();
        }

        if ($user_job->record_interview) {
            $user_job->record_interview->deleteRecord();
            $user_job->record_interview->delete();
        }

        $user_job->delete();

        return back()->withMessage('this application has been deleted successfully');
    }

    public function inviteUser($job_id, $user_id, User $user_model, Job $job_model)
    {
        $user = $user_model->active()->where(['id' => $user_id])->firstOrFail();

        $job = $job_model->activecompany()->activejob()->where([
            'id' => $job_id,
        ])->firstOrFail();

        $job->sendInvitation($user);

        return back()->withMessage('user invitation sent successfully');
    }
}
