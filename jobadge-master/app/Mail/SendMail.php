<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $mail_body;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_body, $subject)
    {
        //
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
        
        return $this->from( "Customer support" == $this->subject ?  "ahmed.abdou@jobadge.com" :'info@jobadge.com')->subject($this->subject)->view('user.mails.email')->with([
            'mail_body' => $this->mail_body,
        ])->priority(1);
    }
}
