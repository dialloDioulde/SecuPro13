<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Cette fonction renvoie True si l'Utilisateur Connecté a le rôle USER et ADMIN
        Gate::define('user-roles', function ($user) {
            return $user->hasAnyRole(['admin','user']);
        });


        // Cette fonction renvoie True si l'utilisateur Connecté a le rôle ADMIN
        Gate::define('user-role-admin', function ($user) {
            return $user->hasAnyRole(['admin']);
        });

        // Cette fonction True si l'utilisateur Connecté est un ADMIN
        Gate::define('user-admin', function ($user) {
            return $user->isAdmin();
        });



    }
}
