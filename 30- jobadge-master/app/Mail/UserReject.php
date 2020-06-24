<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserReject extends Mailable
{
    use Queueable, SerializesModels;

    public $userJob;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userJob , $subject)
    {
        //
        $this->subject = $subject;
        $this->userJob = $userJob;
       
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@jobadge.com')->subject($this->subject)->view('user.mails.userReject')->with([
            'userJob' => $this->userJob,
        ])->priority(1);
    }
}
