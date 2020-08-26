<?php

namespace App;

use App\Http\Controllers\Auth\MustVerifyEmailImproved;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Symfony\Component\VarDumper\Dumper\esc;

class User extends Authenticatable implements MustVerifyEmail
{
    use MustVerifyEmailImproved; // Ici on appelle la classe qui permet l'envoie automatique de Mail à l'administateur après la vérification de l'email par l'Utilisateur
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // On Vérifie si l'Utilisateur connecté est un Admin ou non
    public function isAdmin()
    {
        if($this->is_admin == true){
            return true;
        }
        else{
            return false;
        }

    }

    // On Vérifie si l'Utilisateur a confirmé ou non son adresse Mail
    public function mailIsConfirmed()
    {
        if (! is_null($this->email_verified_at)){
            return true;
        }
        else{
            return false;
        }
    }

    // On Vérifie si l'Utilisateur est approuvé ou non par l'Administrateur
    public function isApproved()
    {
        if (is_null($this->approved_at)){
            return false;
        }
        else{
            return true;
        }

    }

    // On Vérifie si le compte de l'Utilisateur est Suspendu ou non
    public function isRefused()
    {
        if (is_null($this->deleted_at)){
            return false;
        }
        else{
            return true;
        }
    }

    // On si l'Utilisateur est Banni ou non de la platforme
    public function isBanned()
    {
        if (! is_null($this->banned_at)){
            return true;
        }
        else{
            return false;
        }
    }


    // On si l'Utilisateur est Banni ou non de la platforme
    public function isNotBanned()
    {
        if (is_null($this->banned_at)){
            return true;
        }
        else{
            return false;
        }
    }


}
