<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareIdeaMail extends Mailable
{
    use Queueable, SerializesModels;


    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->url = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@yalla-furnish.com')->view('emails.shareIdeaMail')->with([
            'url' => $this->url,
        ])->priority(1);
    }
}
