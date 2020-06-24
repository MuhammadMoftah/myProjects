<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function getNotification($id)
    {
        $notification = auth('user')->user()->notifications()->where('id', $id)->firstOrFail();
        $notification->markAsRead();
        $url = $notification->data['url'];
        return redirect($url);
    }
}
