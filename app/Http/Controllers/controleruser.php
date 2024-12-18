<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\usermodel;

class controleruser extends Controller
{
    public function Verifie_User_existe(Request $request)
    {
        // Validation des données d'entrée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Recherchez l'utilisateur
        $user = usermodel::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            Session::put('user_id', $user->id);
            // Rediriger vers la page "compte"
            return redirect()->route('compte.index')->with('success_connected', 'Connexion réussie.');
        } else {
            // Retourner une erreur
            return redirect()->back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.',
            ]);
        }
    }
}
