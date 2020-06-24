<?php

namespace App\Services\site;

use App\Follow_Users;
use Illuminate\Http\Request;
use App\Activity;

class FollowService
{
    protected $request;
    protected $followService;

    public function __construct(Request $request, Follow_Users $followService)
    {
        $this->request = $request;
        $this->followService = $followService;
    }

    public function followUser($following, $followerId)
    {
        $activity = new Activity();
        $follow = $this->followService->where('follower_id', $followerId)
            ->where('following_id', $following->id)->first();

        if ($follow) {
            $follow->delete();
            $followsCount = $this->followService->where('following_id', $following->id)->count();
            $activity->create([
                'user_id' => $followerId,
                'activity' => "UnFollow <a href='/UserProfile/" . $following->id . "'>$following->first_name</a>",
            ]);
            return [null, $followsCount];
        }

        $follow = $this->followService->create([
            'following_id' => $following->id,
            'follower_id' => $followerId,
        ]);
        $followsCount = $this->followService->where('following_id', $following->id)->count();
        $activity->user_id = $followerId;
        $activity->create([
            'user_id' => $followerId,
            'activity' => "Follow <a href='/UserProfile/" . $following->id . "'>$following->first_name</a>",
        ]);
        return [$follow, $followsCount];
    }
}
