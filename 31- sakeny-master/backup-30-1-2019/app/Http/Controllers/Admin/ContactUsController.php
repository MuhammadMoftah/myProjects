<?php

namespace App\Http\Controllers\Admin;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class ContactUsController extends CoreController
{
    function __construct(ContactUs $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name', 'email','phone'];
        $this->show_columns_select = ['id', 'name', 'email','phone'];

        parent::__construct();
    }

    public function postReply()
    {
        $this->v([
            'email'=>'required'
        ]);

        Mail::raw($this->request->message, function ($message) {
            $message->from(env('MAIL_USERNAME'), 'Sakeny');
            $message->subject($this->request->subject);
            $message->to($this->request->email);
        });


        return back()->with('success', 'Your mail sent successfully');
    }


}
