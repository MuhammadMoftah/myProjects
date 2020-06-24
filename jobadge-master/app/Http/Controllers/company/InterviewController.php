<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveInterview;
use App\UserJob;
use Carbon\Carbon;
use App\RecordInterview;

class InterviewController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function postLiveInterview($userjob_id, LiveInterview $live_interview_model, UserJob $user_job_model)
    {
        $this->validate($this->request, $live_interview_model->getCreateAndUpdateRules());

        $company = auth()->guard('company')->user();

        $user_job = $user_job_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->firstOrFail();

        if ($user_job->live_interview || $user_job->record_interview) {
            return back()->withErrors('you already arranged interview for this application');
        }

        $live_interview_model->userjob_id = $user_job->id;
        $live_interview_model->from = $this->request->from;
        $live_interview_model->to = $this->request->to;
        $live_interview_model->channel_name = $company->name . '-' . $user_job->user->first_name . $user_job->user->last_name . ' ' . $user_job->job->title;

        if (!$live_interview_model->save()) {
            abort(500);
        }

        $live_interview_model->sendUserInterviewMail();
        $live_interview_model->sendCompanyInterviewMail();

        return redirect()->route('company.cvs.get')->withMessage('Live interview arranged successfully');
    }

    public function postRecordInterview($userjob_id, RecordInterview $record_interview_model, UserJob $user_job_model)
    {
        $this->validate($this->request, $record_interview_model->getCreateAndUpdateRules());

        if ($this->request->question2) {
            $this->validate($this->request, $record_interview_model->validateQ2());
        }

        if ($this->request->question3) {
            $this->validate($this->request, $record_interview_model->validateQ3());
        }

        $company = auth()->guard('company')->user();

        $user_job = $user_job_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->firstOrFail();

        if ($user_job->live_interview || $user_job->record_interview) {
            return back()->withErrors('you already arranged interview for this application');
        }

        $record_interview_model->userjob_id = $user_job->id;
        $record_interview_model->from = $this->request->from;
        $record_interview_model->to = $this->request->to;
        $record_interview_model->channel_name = $company->name . '-' . $user_job->user->first_name . $user_job->user->last_name;
        $record_interview_model->question1 = $this->request->question1;
        $record_interview_model->question2 = $this->request->question2;
        $record_interview_model->question3 = $this->request->question3;

        if (!$record_interview_model->save()) {
            abort(500);
        }

        $record_interview_model->sendUserInterviewMail();

        return redirect()->route('company.cvs.get')->withMessage('Record interview arranged successfully');
    }

    public function AcceptApplicant($userjob_id, UserJob $user_job_model)
    {
        $company = auth()->guard('company')->user();

        $user_job = $user_job_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->firstOrFail();

        if (($user_job->live_interview && !$user_job->live_interview->isExpire()) || ($user_job->record_interview && !$user_job->record_interview->isExpire())) {
            return back()->withErrors('you cant take that action now');
        }

        $user_job->update([
            'reject_state' => null,
            'qualified_state' => null,
            'shortlist_state' => null,
            'reason' => null,
            'accept_state' => Carbon::now()
        ]);

        $user_job->live_interview ? $user_job->live_interview->delete() : '';
        $user_job->record_interview ? ($user_job->record_interview->delete()) && ($user_job->record_interview->deleteRecord())
            : '';

        $user_job->user->sendStateNotification($user_job->job->title, 'Hi,' . $user_job->user->full_name . '<br> This is your application Status:Accepted');

        return back()->withMessage('this applicant set to accepted state');
    }

    public function RejectApplicant($userjob_id, UserJob $user_job_model)
    {
        $this->validate($this->request, ['reason' => 'required|in:location,over_qualified,not_qualified']);

        $company = auth()->guard('company')->user();

        $user_job = $user_job_model->where('id', $userjob_id)->whereHas('job', function ($query) use ($company) {
            $query->activecompany()->where('company_id', $company->id);
        })->with(['user','job.company'])->firstOrFail();

        if (($user_job->live_interview && !$user_job->live_interview->isExpire()) || ($user_job->record_interview && !$user_job->record_interview->isExpire())) {
            return back()->withErrors('you cant take that action now');
        }

        $user_job->update([
            'reject_state' => Carbon::now(),
            'qualified_state' => null,
            'shortlist_state' => null,
            'reason' => $this->request->reason,
            'accept_state' => null
        ]);

        $user_job->live_interview ? $user_job->live_interview->delete() : '';
        $user_job->record_interview ? ($user_job->record_interview->delete()) && ($user_job->record_interview->deleteRecord())
            : '';

        $user_job->user->sendStateNotification($user_job->job->title, 'Hi,' . $user_job->user->full_name . '<br> This is your application Status:Rejected for ' . $this->request->reason);
        $user_job->user->sendUserRefusingInterview($user_job);   
        return back()->withMessage('this applicant set to reject state');
    }

    public function getLiveInterview($channel_name, LiveInterview $live_interview_model)
    {
        $live = $live_interview_model->where([
            'channel_name' => $channel_name,
        ])->firstOrFail();

        $company = auth()->guard('company')->user();

        if ($live->userjob->job->company_id != $company->id) {
            return redirect()->route('user.index');
        }

        if ($live->isExpire()) {
            return redirect()->route('session.expire');
        }

        if (!$live->isOpen()) {
            return redirect()->route('session.notstarted');
        }
        $isUser = false;
        return view('user.pages.live2Video', compact("channel_name","isUser"));
        // return view('company.pages.liveVideo', compact('live'));
    }
}
