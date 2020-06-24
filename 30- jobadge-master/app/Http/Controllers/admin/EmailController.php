<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Email;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmailImport;

class EmailController extends Controller
{
    protected $email_model;
    protected $request;

    public function __construct(Email $email_model, Request $request)
    {
        $this->request = $request;
        $this->email_model = $email_model;
    }

    public function getSendEmails()
    {
        return view('admin.pages.emails.sendMail');
    }

    public function postSendEmails()
    {
        $this->validate($this->request, $this->email_model->validate_send_mails());

        try {
            Excel::import(new EmailImport, $this->request->file);
        } catch (\Exception $e) {
            return back()->withErrorS($e->getMessage());
        }

        return back()->withMessage('Mails Sent Successfully');
    }
}
