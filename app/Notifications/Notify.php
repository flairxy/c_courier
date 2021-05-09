<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Notify extends Notification
{
    use Queueable;

    public $subject, $body, $username;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $username)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->greeting('Hello ' . $this->username . ',')
            ->subject($this->subject)
            ->line($this->body);
    }
}
