<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    use Queueable;


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Forgot Password')
            ->markdown('emails.users.resetpassword', ['token' => $this->token]);
    }
}
