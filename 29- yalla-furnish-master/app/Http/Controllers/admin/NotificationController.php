<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function getNotification($id)
    {
        $notification = auth('web')->user()->notifications()->where('id', $id)->firstOrFail();
        $notification->markAsRead();
        $url = $notification->data['url'];
        return redirect($url);
    }
}
