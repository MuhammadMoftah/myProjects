<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RoomMessages extends Model
{
    /**
     * Seen == 1 ?  seen
     * Seen == 0 ?   not seen
     */
    protected $fillable = ['room_id', 'sender_id', 'message', 'chat_room_id', 'seen'];

    protected $guard = array('attachment', 'seen');

    protected $with = ['sender'];
    protected $appends = ['date'];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['room'];


    public function room()
    {
        return $this->belongsTo(ChatRooms::class, 'chat_room_id', 'id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }


    /*    public function setAttachmentAttribute($attachment)
    {
        if ($attachment) {
            $this->attributes['attachment'] = $attachment->store('uploads/chat/attachment');
        }
    }*/

    public function getDateAttribute()
    {
        return '';
        // return $this->created_at->diffForHumans();
    }
}
