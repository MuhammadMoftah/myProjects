<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveInterview;
use App\RecordInterview;

class InterviewController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    } 
    public function getLiveInterview($channel_name, LiveInterview $live_interview_model)
    {
        $live = $live_interview_model->where([
            'channel_name' => $channel_name,
        ])->firstOrFail();

        $user = auth()->guard('user')->user();

        if ($live->userjob->user_id != $user->id) {
            return redirect()->route('user.index');
        }

        if ($live->isExpire()) {
            return redirect()->route('session.expire');
        }

        if (!$live->isOpen()) {
            return redirect()->route('session.notstarted');
        }
        $isUser = true;
        return view('user.pages.live2Video', compact("channel_name","isUser"));
        // return view('user.pages.liveVideo', compact('live'));
    } 

    public function newLiveInterview($channel_name){
        // dd($channel_name);
        $isUser = true;
        return view('user.pages.live2Video', compact("channel_name","isUser"));
    }

    public function getRecordInterview($channel_name, RecordInterview $record_interview_model)
    {
        $record = $record_interview_model->where([
            'channel_name' => $channel_name,
        ])->firstOrFail();

        $user = auth()->guard('user')->user();

        if ($record->userjob->user_id != $user->id) {
            return redirect()->route('user.index');
        }

        if ($record->isExpire()) {
            return redirect()->route('session.expire');
        }

        if (!$record->isOpen()) {
            return redirect()->route('session.notstarted');
        }

        return view('user.pages.recordVideo', compact('record'));
    } 
    public function uploadRecord($record_id, RecordInterview $record_interview_model)
    {
        $record = $record_interview_model->find($record_id);

        if (!$record) {
            return response()->json(['message' => 'unavailable record interview', 'code' => 404]);
        }

        $user = auth()->guard('user')->user();

        if ($record->userjob->user_id !== $user->id) {
            return response()->json(['message' => 'not authorized', 'code' => 401]);
        }

        if ($record->isExpire()) {
            return redirect()->route('session.expire');
        }

        if (!$record->isOpen()) {
            return redirect()->route('session.notstarted');
        }

        $this->validate($this->request, $record_interview_model->validateVideo());

        $video_name = $record_interview_model->uploadRecord($this->request->video);

        $record->deleteRecord();

        $record->update([
            'user_video' => $video_name,
        ]);

        return response()->json('your video uploaded successfully');
    }  
    public function declineLiveInterview($id, LiveInterview $live_interview_model)
    {
        $live_interview = $live_interview_model->findOrFail($id);

        $live_interview->update([
            'declined' => 1,
            'comment' => $this->request->comment,
        ]);

        $job = $live_interview->userjob->job;

        $live_interview->userjob->job->company->sendDeclineEmail($this->request->comment, $job);

        return redirect()->route('user.index');
    }
}
