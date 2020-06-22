<?php

namespace App\Notifications;

use App\RapportLaboratoire;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RapportCreatedNotification extends Notification
{
    use Queueable;
	/**
	 * @var RapportLaboratoire
	 */
	public $rapport;

	/**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RapportLaboratoire $rapport)
    {
        //
	    $this->rapport = $rapport;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Le rapport du patient ' . $this->rapport->patient->nom .  ' a été mis à jour par le laboratoire.'
        ];
    }
}
