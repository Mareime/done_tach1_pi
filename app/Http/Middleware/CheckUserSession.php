<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckUserSession
{
    public function handle($request, Closure $next)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Session::has('user_id')) {
            return redirect()->route('connexion.form')->withErrors([
                'error' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }

        return $next($request);
    }
}
