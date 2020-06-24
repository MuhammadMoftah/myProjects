<?php

namespace App\Services\site;

use App\Showroom_Follower;
use Illuminate\Http\Request;
use App\Activity;

class ShowroomFollowerService
{
    protected $request;
    protected $showroomFollower;

    public function __construct(Request $request, Showroom_Follower $showroomFollower)
    {
        $this->request = $request;
        $this->showroomFollower = $showroomFollower;
    }

    public function followShowroom($showroom, $userId)
    {
        $activity = new Activity();
        $follow = $this->showroomFollower->where([
            'user_id' => $userId,
            'showroom_id' => $showroom->id,
        ])->first();

        if ($follow) {
            $follow->delete();
            $followsCount = $this->showroomFollower->where('showroom_id', $showroom->id)->count();
            $activity->create([
                'user_id' => $userId,
                'activity' => "UnFollow <a href='/showroom/" . $showroom->slug . "'>$showroom->name_en</a>"
            ]);
            return [null, $followsCount];
        } else {
            $follow = $this->showroomFollower->create([
                'user_id' => $userId,
                'showroom_id' => $showroom->id,
            ]);
            $followsCount = $this->showroomFollower->where('showroom_id', $this->request->showroom_id)->count();
            $activity->create([
                'user_id' => $userId,
                'activity' => "Follow <a href='/showroom/" . $showroom->slug . "'>$showroom->name_en</a>",
            ]);
            return [$follow, $followsCount];
        }
    }
}
