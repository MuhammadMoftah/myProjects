<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Consultant;
use App\Mail\ConsultantMail;
use Illuminate\Support\Facades\Mail;

class ConsultantService
{
    private $consultant_model;
    private $request;

    public function __construct(Consultant $consultant_model, Request $request)
    {
        $this->consultant_model = $consultant_model;
        $this->request = $request;
    }

    public function store()
    {
        $consultant = $this->consultant_model->create([
            'message' => $this->request->message,
            'subject' => $this->request->subject ? $this->request->subject : null,
            'user_id' => auth('user')->user()->id,
        ]);

        if (request('images')) {
            foreach (request('images') as $image) {
                $images[] = ['image' => $image];
            }

            $consultant->images()->createMany($images);
        }

        $this->sendConsultantMail($consultant, request('images'));
    }

    public function sendConsultantMail($consultantData, $images)
    {
        $subject = "Consultant";
        Mail::to('info@yalla-furnish.com')->send(new ConsultantMail($consultantData, $subject, $images));
    }
}
