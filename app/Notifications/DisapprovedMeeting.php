<?php

namespace App\Notifications;

use App\Domains\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DisapprovedMeeting extends Notification
{
    use Queueable;

    private $meeting;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
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
                    ->subject('Carona Não Aprovada')
                    ->greeting('Olá '. $this->meeting->User->Profile->name.' '.$this->meeting->User->Profile->last_name)
                    ->line('Sua solicitação para a viagem do(a) '.$this->meeting->Trip->User->Profile->name.' '.$this->meeting->Trip->User->Profile->last_name.' Foi REPORVADA!!')
                    ->line('Lamentamos, porém não perca a esperança.')
                    ->line('Confira outras viagens que seja próxima a que você queria.')
                    ->action('Buscar Viagens', url('/user/trip'))
                    ->line('Obrigado por usar nosso aplicativo.');
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
