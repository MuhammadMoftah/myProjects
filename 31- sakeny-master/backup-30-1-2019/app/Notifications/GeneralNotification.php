<?php

namespace App\Notifications\User;

use App\Channels\FcmChannel;
use Illuminate\Bus\Queueable;
use App\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Auth;

/**
 * driver end the order
 * type = 5
 */
class GeneralNotification extends Notification
{
    use Queueable;

    private $base_notification; // instance of BaseNotification

    public $notifier_id;// Who send notification

    public $data; // data will pass to constructor

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DatabaseChannel::class];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable, $notification)
    {
        return  [
            'title'=>$notification->title,
            'content'=>$notification->message,
            'type'=>1
        ];
    }
}
