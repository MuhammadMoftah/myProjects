<?php

namespace App\Services\site;

use App\Activity;
use Illuminate\Http\Request;

class ActivityService
{
    private $activity_model;
    private $request;

    public function __construct(Activity $activity_model, Request $request)
    {
        $this->activity_model = $activity_model;
        $this->request = $request;
    }

    public function getUserActivities($userId)
    {
        return $this->activity_model->with('users')->where('user_id', $userId)->latest()->paginate(20);
    }
}
