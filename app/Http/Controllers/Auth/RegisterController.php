<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // On a ajouté ce bout de code pour empêcher un Utilisateur de se s'Inscrire à nouveau avec une adresse mail déjà banni sur notre plateforme
        $validator->after(function ($validator){
            $data = $validator->getData(); // On récupère les données après la validation

            // Ici on cherche l'adresse mail renseignée parmi toutes celles déjà banni par la plateforme
            $userIsBanned = User::withTrashed()->where('email', $data['email'])->whereRaw('banned_at is not null')->count();

            // Si on trouve que l'adresse mail est banni on lui notifie cela
            if ($userIsBanned){
                $validator->errors()->add('email', 'Le Compte associé à cette adresse mail est déjà Banni sur notre plateforme !');
            }
        });

        // On retourne la validation des données
        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
