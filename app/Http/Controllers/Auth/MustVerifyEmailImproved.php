<?php
namespace App\Http\Controllers\Auth;
use App\Mail\UserConfirmed;
use Illuminate\Support\Facades\Mail;


// Cette Classe permet l'envoie automatique de Mail à l'administrateur
trait MustVerifyEmailImproved
{

    /**
     * @return bool
     */

    // Cette fonction envoie automatiquement un Mail à l'Administrateur dès que l'Utilisateur confirme son adresse Mail
    public function markEmailAsVerified(){
        if ($this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save()){
                Mail::send(new UserConfirmed($this->email));
                return true;
        }
    }

}
