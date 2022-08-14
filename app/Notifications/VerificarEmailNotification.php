<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class VerificarEmailNotification extends VerifyEmail
{

    private $name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
     /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Confirmação de email')
            ->greeting('Olá',$this->name)
            ->line('Clique a baixo para validar esse email')
            ->action('Aqui valide seu email', $url)
            ->line('Caso nao tenha se cadastrado nosso sistema apenas desconsidere.')
            ->salutation('Até Breve');
    }
}
