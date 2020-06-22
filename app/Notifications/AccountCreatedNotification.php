<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AccountCreatedNotification extends Notification
{
    use Queueable;

    public $password;
	public $email;

	/**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password,$email)
    {
        $this->password = $password;
	    $this->email = $email;
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
	                ->subject('Votre compte sur ' . config('app.name'))
                    ->line('Un compte à votre nom a été créé avec cette adresse e-mail.')
                    ->line(new HtmlString('Nom d\'utilisateur: <strong> ' . $this->email . ' </strong>'))
                    ->line(new HtmlString('Mot de passe: <strong>' . $this->password . '</strong>'))
                    ->action('Se connecter', url('/login'))
                    ->line('Merci !');
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
