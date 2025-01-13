<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     // Vérifie si l'utilisateur est connecté
        // if (!session()->has('user_id')) {
        //     return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        // }

        // return $next($request);
    // }
}