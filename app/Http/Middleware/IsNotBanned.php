<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
class IsNotBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // On vérifie si l'Utilisateur est Connecté
        if (Auth::user() !== null){
            // Si l'Utilisateur Connecté n'est pas banni on laisse la connection s'excutée
            if (Auth::user()->isNotBanned()){
                return $next($request);
            }
        }
        else if($request['email'] !== null){    // Dans le cas où l'Utilisateur n'est pas connecté on recpère l'adresse mail saisie
            //$user = User::withTrashed()->firstWhere('email', $request['email']); // On récupère l'Utilisateur en Bases De Données
            $user = User::firstWhere('email', $request['email']); // On récupère l'Utilisateur en Bases De Données

            if($user === null || $user->isNotBanned()){ // Si l'Utilisateur se connecte pour la première fois ou s'il n'est pas banni on laisse la connexion s'executée
                return $next($request);
            }
        }

        // On arrive dans cette partie dans le cas où l'Utilisateur est déjà banni de la plateforme
        $banMessage = "Connexion Impossible, veuillez contacter le service d'Administration du Site Web !";
        Auth::logout();
        return redirect()->route('login')->withMessage($banMessage);
    }

}
