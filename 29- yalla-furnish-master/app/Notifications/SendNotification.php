<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $notificationObject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificationObject)
    {
        $this->notificationObject = $notificationObject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Notification From Yalla Furnish!')
            ->line(strip_tags($this->notificationObject['text']))
            ->action('Check', $this->notificationObject['url'])
            ->line('Thankyou for using Yalla-Furnish.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'assigned_user' => $notifiable->id, //Assigned user ID
            'message' => $this->notificationObject['text'],
            'type' => $this->notificationObject['type'],
            'type_id' => $this->notificationObject['typeId'],
            'url' => $this->notificationObject['url'],
        ];
    }
}
