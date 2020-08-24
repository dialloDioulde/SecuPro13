<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

// Dans ce Middleware on empêche les Utilisateurs Non Approuvés par l'Admin de se Connecter

class MustBeApproved
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
        if (Auth::check() && !Auth::User()->approved_at){
            return redirect('mustbeapproved');
        }

        return $next($request);
    }
}
