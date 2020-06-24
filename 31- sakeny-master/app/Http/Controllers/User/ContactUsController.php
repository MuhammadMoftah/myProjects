<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{

        /**
        * Show the application dashboard.
        *
        * @return \Illuminate\Http\Response
        */
        public function contactUs() {
            $title = trans('lang.Contactus');
            return view("site.pages.contactUs", compact('title'));
        }
        /**
        * Show the application dashboard.
        *
        * @return \Illuminate\Http\Response
        */
        public function contactUSPost(ContactUsRequest $request)
        {
 
            $contactUS = ContactUS::create($request->only('name', 'phone', 'email', 'message'));

             if($contactUS){
                $data = $request->only('name', 'phone', 'email', 'message');
                Mail::to('info@sakeny.com')->send(new ContactUsMail($data));
           
                // if (Mail::failures()) {
                //      return response()->Fail('Sorry! Please try again latter');
                // }else{
                //      return response()->success('Great! Successfully send in your mail');
                //    }
            }
            return back()->with('message', 'Thanks for contacting us!');
        }

}
