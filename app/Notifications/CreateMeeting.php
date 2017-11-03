<?php

namespace App\Notifications;

use App\Domains\Trip;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateMeeting extends Notification
{
    use Queueable;

    protected $trip;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
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
                    ->line('Algu�m quer pegar carona com voc�')
                    ->line('Referente a sua viagem no dia '.$this->trip->date)
                    ->line('Saindo de :'.$this->trip->exit_address.' Indo para :'.$this->trip->arrival_address)
                    ->action('Ver Solicita��o', url('/'))
                    ->line('Obrigado por usar nosso aplicativo');
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
