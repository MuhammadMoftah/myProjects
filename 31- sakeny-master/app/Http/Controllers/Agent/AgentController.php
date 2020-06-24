<?php

namespace App\Http\Controllers\Agent;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectContact;
use Mail;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Country;
use Hash;
use App\Models\Package;
use App\Models\Project;
use App\Models\Reports;
use DB;
use App\Models\Settings;
use Auth;
use App\Models\UnitView;
use App\Models\Amenities;
use App\Models\ContactUs;
use App\Models\Developer;
use App\Models\OfferType;
use App\Models\CompareAds;
use App\Models\PropertyType;
use App\Models\SearchHistory;
use App\Models\LevelOfFinished;
use App\Models\LifeStyleCategory;
use App\Models\LifeStyle;
use App\Models\Template;
use Session;
use App\Models\District;
use Socialite;
use App\Models\AdsImage;
use App\Models\HeaderImage;
use App\Models\AdFavourite;
use App\Models\PackagePayment;
use App\Models\Chat\ChatRooms;
use App\Models\Chat\RoomMessages;
use App\Models\History;
use App\Models\Agent;

class AgentController extends Controller
{
    public function getMyAds($lang)
    {
        $agent = auth()->guard('user')->user();

        $ads = Ads::Valid()->active()->where('agent_id', $agent->id)->paginate(9);

        $title = trans('lang.my_ads') . ' | ' . trans('lang.sakeny');

        return view('site.pages.agent.agentAds', compact('ads', 'title'));
    }

    public function getInbox($lang)
    {
        $user = auth()->guard('user')->user();

        $rooms = ChatRooms::WhereHas('ad', function ($query) use ($user) {
            $query->where('agent_id', $user->id);
        })->latest()->paginate(10);

        foreach ($rooms as $room) {
            $room['title_name'] = $room->user_id == $user->id ? $user->name : $room->getLastMessageAttribute()->sender->name;
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.agent.inbox', compact('rooms', 'title'));
    }

    public function getChatRoom($lang,$id)
    {
        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $id
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('agent_id', $user->id);
            });
        })->firstOrFail();

        $messages = RoomMessages::where('chat_room_id', $room->id)->where('sender_id', '!=', $user->id)->get();


        foreach ($messages as $message) {
            $message->update([
                'seen' => 1
            ]);
        }

        $title = trans('lang.messaging') . ' | ' . trans('lang.sakeny');

        return view('site.pages.agent.room', compact('room', 'title'));
    }

    public function postMessageToRoom($room_id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $user = auth()->guard('user')->user();

        $room = ChatRooms::where([
            'id' => $room_id
        ])->where(function ($query) use ($user) {
            $query->WhereHas('ad', function ($query) use ($user) {
                $query->where('agent_id', $user->id);
            });
        })->firstOrFail();

        RoomMessages::create([
            'sender_id' => $user->id,
            'message' => $request->message,
            'chat_room_id' => $room->id,
        ]);

        return back();
    }
}
