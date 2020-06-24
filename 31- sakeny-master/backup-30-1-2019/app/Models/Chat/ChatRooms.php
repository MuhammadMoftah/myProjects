<?php

namespace App\Models\Chat;

use App\Models\User;
use App\Models\Ads;
use App\Models\Chat\RoomMessages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChatRooms extends Model
{

    protected $fillable = ['ad_id','user_id'];

    protected $appends = ['last_message','date','last_message_time'];

    protected $guard = ['status'];

    public function ad()
    {
        return $this->belongsTo(Ads::class,'ad_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(RoomMessages::class,'chat_room_id','id');
    }


    //last_message
    public function getLastMessageAttribute()
    {
        $last_message = $this->messages()
                        ->latest()
                        ->first();
        if ($last_message) {
            return $last_message->message;
        }

        if ($this->status == 2 && !$last_message) {
            return 'New request';
        }
        return null;
    }

    /**
     * get date attribute in xx xxx ago for mobile
     * @return [type] [description]
     */
    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    /**
     * get date attribute in xx xxx ago for mobile
     * @return [type] [description]
     */
    //last_message_time
    public function getLastMessageTimeAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

}
