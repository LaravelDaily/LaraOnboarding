<?php

namespace Laraveldaily\LaraOnboarding;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OnboardingMail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var array
     */
    public $email_data;

    /**
     * Create a new notification instance.
     *
     * @param array $email_data
     * @return void
     */
    public function __construct($email_data)
    {
        $this->email_data = $email_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $notifiable;
        return (new MailMessage)
            ->subject($this->email_data['subject'])
            ->view($this->email_data['template'], compact('user'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
