<?php

namespace App\Notifications\Email;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class CustomVerifyEmail extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)->subject('Verificacion de Correo Electrónico')->view(
            'emails.custom-verify-email', ['url' => $this->verificationUrl($notifiable)]
        );
    }
}
