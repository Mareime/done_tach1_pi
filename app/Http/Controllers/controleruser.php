<?php

namespace App\Http\Controllers;

use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class controleruser extends Controller
{
  
    public function showLoginForm()
    {
        // Assurez-vous que la vue connexion.connexion existe
        return view('connexion.connexion');
    }

    public function home()
    {
        return view("connexion.home");
    }
    
    public function login(Request $request)
    {
        // Validation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Régénérer la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();
    
            // Redirection vers la page d'accueil
            return redirect()->route('compte.index')->with('success', 'Vous avez été connecté avec succès.');
        }
    
        // Retour en arrière avec une erreur si la connexion échoue
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }
    
    

   
    public function logout(Request $request)
    {
        
        Auth::logout();

   
        $request->session()->invalidate();


        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
