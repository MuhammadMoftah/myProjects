<?php

namespace App\Services\site;

use App\UserUpdate;
use Illuminate\Http\Request;
use App\Follow_Users;

class UpdatesService
{
    private $updates_model;
    private $request;

    public function __construct(UserUpdate $updates_model, Request $request)
    {
        $this->updates_model = $updates_model;
        $this->request = $request;
    }

    public function getUserUpdates($userId)
    {
        $followings = Follow_Users::select('following_id')->where('follower_id', $userId)->get();

        $updates = $this->updates_model->newQuery();

        if (request('search')) {
            $keyword = request('search');

            $updates->where(function ($query) use ($keyword) {
                $query->whereHas('product', function ($query) use ($keyword) {
                    $query->where('name_en', 'like', '%' . $keyword . '%')
                        ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                })->orWhereHas('idea', function ($query) use ($keyword) {
                    $query->where('name_en', 'like', '%' . $keyword . '%')
                        ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                })->orWhereHas('showroom', function ($query) use ($keyword) {
                    $query->where('name_en', 'like', '%' . $keyword . '%')
                        ->orWhere('name_ar', 'like', '%' . $keyword . '%');
                })->orWhereHas('topic', function ($query) use ($keyword) {
                    $query->where('body', 'like', '%' . $keyword . '%');
                });
            });
        }

        if (count($followings) > 0) {
            for ($i = 0; $i < count($followings); $i++) {
                $ids[] = $followings[$i]->following_id;
            }
        } else {
            $updates = [];
            return $updates;
        }

        $updates->where(function ($query) use ($ids) {
            $query->whereIn('user_id', $ids);
        });

        $updates = $updates->with(['user', 'showroom', 'topic', 'product', 'idea', 'topic'])->latest()->get();
                
        return $updates;
    }

    public function getShowroomUpdates($showrooms_ids)
    {
        $showroom_updates = UserUpdate::whereIn('showroom_id', $showrooms_ids)->with(['showroom', 'user', 'topic', 'product', 'idea', 'offer'])->latest()->get();
        return $showroom_updates;
    }
}
