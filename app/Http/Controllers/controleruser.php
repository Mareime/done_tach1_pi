<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class controleruser extends Controller
{
    // Vérifie si l'utilisateur existe et connecte
    public function Verifie_User_existe(Request $request)
    {
        // Validation des données d'entrée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentative d'authentification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si l'authentification réussit, rediriger vers la page protégée
            return redirect()->route('compte.index')->with('success', 'Connexion réussie.');
        }

        // Retourner une erreur si l'authentification échoue
        return redirect()->back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    // Vérifie si l'utilisateur est connecté
    public function getUserId()
    {
        if (Auth::check()) {
            return response()->json([
                'status' => 'success',
                'user_id' => Auth::id(),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Utilisateur non connecté.',
            ]);
        }
    }
}
