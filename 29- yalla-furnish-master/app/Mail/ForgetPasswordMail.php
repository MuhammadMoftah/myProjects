<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPasswordMail extends Mailable
{
    public $mail_body;
    public $subject;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_body, $subject)
    {
        $this->subject = $subject;
        $this->mail_body = $mail_body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@yalla-furnish.com')->subject($this->subject)->view('emails.forgetMail')->with([
            'mail_body' => $this->mail_body,
        ])->priority(1);
    }
}
