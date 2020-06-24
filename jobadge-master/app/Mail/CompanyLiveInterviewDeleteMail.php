<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyLiveInterviewDeleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_data, $subject)
    {
        //
        $this->subject = $subject;
        $this->mail_data = $mail_data;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@jobadge.com')->subject($this->subject)->view('user.mails.companyLiveInterviewDelete')->with([
            'mail_data' => $this->mail_data,
        ])->priority(1);
    }
}
