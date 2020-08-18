<?php

namespace App\Http\Middleware;

use Closure;


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
        if (!auth()->user()->approved_at){
            return redirect('mustbeapproved');
        }

        return $next($request);
    }
}
