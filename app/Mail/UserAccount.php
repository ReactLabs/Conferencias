<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Envia o e-mail de aviso de ativação ou desativação da conta
 * @param name nome do usuário
 * @param active booleano, se for true entao é um e-mail de ativação, mas caso seja falso então
 * é um e-mail de desativação de conta
 */

class UserAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $user_name;
    private $active;

    public function __construct(String $name, Bool $active)
    {
        $this->user_name = $name;
        $this->active = $active;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->active){
            $view = 'email.userValidation.validated';
        }else {
            $view = 'email.userValidation.canceled';
        }

        
        return $this->markdown($view, [
            'user_name' => $this->user_name,
        ]);
    }
}
