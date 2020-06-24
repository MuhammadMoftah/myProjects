<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class MailsController extends Controller
{

    public function getMail()
    {
        return view('admin.emails.sendMails');
    }

    public function postMail(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:4000',
        ]);

        $users = User::activeuser()->get();

        foreach ($users as $user) {
            $user->sendMessage($request->message);
        }

        return back()->withMessage('message sent to users successfully');
    }
}
