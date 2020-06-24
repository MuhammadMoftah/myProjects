<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsultantMail extends Mailable
{
    public $consultantData;
    public $subject;
    public $images;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultantData, $subject, $images)
    {
        $this->subject = $subject;
        $this->consultantData = $consultantData;
        $this->images = $images;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('info@yalla-furnish.com')->subject($this->subject)->view('emails.consultantMail');

        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
                ->addTextHeader('From:', $this->consultantData->user->email);
        });

        if (!is_null($this->images) && count($this->images) > 0) {
            foreach ($this->images as $image) {
                $email->attach(
                    $image->getRealPath(),
                    [
                        'as' => $image->getClientOriginalName(),
                        'mime' => $image->getClientMimeType(),
                    ]
                );
            }
        }

        $email->with([
            'consultantData' => $this->consultantData,
        ])->priority(1);
    }
}
