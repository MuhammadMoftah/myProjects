<?php

namespace App\Http\Controllers\Api\V1\User;

use Log;
use Mail;
use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Chat\ChatRooms;
use App\Events\Chat\NewMessage;
use App\Events\Chat\SendMessage;
use App\Models\Chat\RoomMessages;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\CoreController;
use App\Notifications\User\GeneralNotification;

class ChatController extends CoreController
{

    function __construct()
    {
        parent::__construct();

        $this->room = new ChatRooms;
        $this->room_messages = new RoomMessages;
    }

    public function scoper()
    {
        return;
    }

    public function index()
    {
        $rooms = new ChatRooms;
        $auth = $this->auth;
        $user_ads_id = Ads::where('owner_id', $this->auth->id)->pluck('id');
        if ($this->auth->type == 1) {
            $rooms = $rooms->where('user_id',$this->auth->id)
                        ->orWhereIn('ad_id', $user_ads_id)
                        ->orWhereHas('messages', function ($messages)  use ( $auth) {
                            $messages->where('sender_id',$auth->id);
                        });

            }
        elseif($this->auth->type == 2) {
            $rooms = $rooms->whereIn('ad_id', $user_ads_id)
                        ->orWhereHas('messages', function ($messages)  use ( $auth) {
                            $messages->where('sender_id',$auth->id);
                        });
        }
        elseif($this->auth->type == 3) {
            $user_ads_id = Ads::where('agent_id', $this->auth->id)->pluck('id');
            $rooms = $rooms->whereIn('ad_id', $user_ads_id)
                        ->orWhereHas('messages', function ($messages)  use ( $auth) {
                            $messages->where('sender_id',$auth->id);
                        });
        }
        $rooms = $rooms->get();
        // event(new NewMessage($this->auth->id, $this->auth->userRooms()));
        return $this->response(compact('rooms'));
    }


    /**
     * send message
     */
    public function store()
    {
        $this->validator([
                'message'      => 'required',
                'ad_id'   => 'required',
                'attachment' => 'mimes:pdf,png,jpg,gif',
            ]
        );

        $sender = $this->auth;

        $ad_id = request('ad_id');

        $room = $this->retrieve($ad_id);

        // return ($room);

        $message = $room->messages()->create([
            'sender_id'=>$sender->id,
            'message' => request('message'),
            // 'attachment'=>request('attachment')
        ]);

        $room->touch();

        $message['sender'] = $sender;

        $receiver_id = request('user_id');
        $receiver = User::find($receiver_id);


        if ($receiver) {
           $subject = "{$sender->name} send you new message - sakeny";
           $content = "{$sender->name} send you new message <br> ". request('message');
            Mail::raw($content, function ($mail) use($subject, $receiver) {
                $mail->from(env('MAIL_USERNAME'), env('APP_NAME'));
                $mail->to($receiver->email);
                $mail->subject($subject);
            });
            $receiver->notify(new GeneralNotification($subject, $content));
        }

        # send push notification
        return $this->response(compact('message'));
    }


    public function show($ad_id)
    {
        $room = $this->retrieve($ad_id);
        return $this->response(compact('room'));
    }


    public function getAdsChatNotifications()
    {
        $auth = $this->auth;
        $user_rooms_ad_owner = $this->room->whereHas( 'ad', function ($query) use ( $auth) {
            $query->where('owner_id',$auth->id);
        })->whereHas('messages', function ($messages) use ( $auth)  {
                $messages->where('sender_id','!=',$auth->id)->where('seen',0);
            })->with('ad')->get();
        $user_rooms_ad_sender =  $this->room->where(function($query) use($auth){
            $query->where(function($query) use($auth){
                $query->where('user_id',$auth->id);
            });
        })->whereHas('messages', function ($messages)  use ( $auth) {
                $messages->where('sender_id','!=',$auth->id)->where('seen',0);
            })->with('ad')->get();
        $user_rooms_count = $user_rooms_ad_owner->count() + $user_rooms_ad_sender->count();
        return $this->response(compact('user_rooms_count','user_rooms_ad_owner' ,'user_rooms_ad_sender'));

    }

    /**
     * retrieve room between authenticated user and ad_id
     * @param  INTEGER $ad_id
     * @return App/Models/Chat/ChatRoom
     */
    public function retrieve($ad_id)
    {
        $auth = $this->auth;
        $room = $this->room->where(function($query) use($ad_id, $auth){
            $query->where('user_id',request('user_id'))
            ->orWhere(function($query) use($auth){
                $query->where('user_id',$auth->id);
            });
        })
        ->where('ad_id',$ad_id)
        ->with('messages')
        ->first();


       /* if (in_array($this->auth->type , [2,3])) {
            $room = $this->room->where(['user_id'=>request('user_id'),'ad_id'=>$ad_id])
                ->with('messages')
                ->first();
        }else {
            $room = $this->room->where(['user_id'=>$auth->id,'ad_id'=>$ad_id])
                ->with('messages')
                ->first();
        }*/
        if (!$room) {
            $this->room->create(['user_id'=>$auth->id,'ad_id'=>$ad_id]);
            return $this->retrieve($ad_id);
        }
        // $this->room_messages->where("chat_room_id",$room->id)->update(['seen'=> 1]);

        return $room;

    }

      public function makeChatSeen($room_id)
    {
        $this->room_messages->where("chat_room_id",$room_id)->update(['seen'=> 1]);
        return $this->response(["data" => true]);
    }

}
