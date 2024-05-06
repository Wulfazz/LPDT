<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('user.login'); // Assurez-vous que la vue existe dans resources/views/user/login.blade.php
    }

    // Traite le formulaire de connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirige l'utilisateur vers la page d'accueil après connexion
        }

        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('user.register'); // Assurez-vous que la vue existe dans resources/views/user/register.blade.php
    }

    // Traite les données du formulaire d'inscription
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        Auth::login($user);
        return redirect('/')->with('success', 'Inscription réussie !'); // Message flash pour confirmer l'inscription
    }
}
