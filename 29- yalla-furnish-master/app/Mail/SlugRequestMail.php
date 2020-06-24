<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SlugRequestMail extends Mailable
{
    public $showroom;
    public $subject;
    public $slug;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($showroom, $subject, $slug)
    {
        $this->subject = $subject;
        $this->showroom = $showroom;
        $this->slug = $slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('info@yalla-furnish.com')->subject($this->subject)->view('emails.slugRequestMail');

        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
                ->addTextHeader('From:', $this->showroom->user->email);
        });

        $email->with([
            'showroom' => $this->showroom,
            'slug' => $this->slug
        ])->priority(1);
    }
}
