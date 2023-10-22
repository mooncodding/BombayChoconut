<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    //  public $url;
    protected $reset_code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $code)
    {
        $this->reset_code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->greeting('Bonjour,')
            ->salutation('Salutations,
             k2')
            ->line('Votre code de vérification de réinitialisation de mot de passe est: '.$this->reset_code) 
            // ->line($this->reset_code)
            // ->action('Click to reset' , $this->url)
            ->line('Veuillez ne pas partager le code de vérification avec qui que ce soit')
            ->subject('Réinitialiser le mot de passe');
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
            //
        ];
    }
}
