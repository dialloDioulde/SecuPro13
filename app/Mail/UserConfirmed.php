<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $email;

    public function __construct($email)
    {
        //
        $this->email = $email;  // On récupère le mail de l'Utilisateur Connecté
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // Cette fonction permet d'envoyer un mail à l'Admin indiquant que l'utilisateur a confirmer son adresse mail
    public function build()
    {
        return $this->from('register@gestion.fr')->to('admin@gestion.fr')
            ->subject('Adresse Mail : Confirmée !')
            ->view('emails.user_confirmed');
    }
}
