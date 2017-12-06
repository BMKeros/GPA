<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Cambiar contraseña')
            ->line('Usted a recibido este correo, debido a que solicito un cambio de contraseña, presione el boton para cambiar su contraseña.')
            ->action('Cambiar Contraseña', url(config('app.url'.':8000').route('password.reset', $this->token, false)))
            ->line('Si usted no solicito este correo, no realice ninguna accion.');
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
