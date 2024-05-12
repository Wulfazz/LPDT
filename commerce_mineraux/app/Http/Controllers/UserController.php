<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Assurez-vous d'utiliser le nom correct de l'attribut d'identifiant
            return redirect()->route('profile', ['user_id' => Auth::user()->user_id])
                             ->with('success', 'Connexion réussie ! Bienvenue sur votre page de profil.');
        }
    
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);
    
        Auth::login($user);
        return redirect()->route('profile', ['user_id' => $user->user_id])
                         ->with('success', 'Inscription réussie ! Bienvenue sur votre page de profil.');
    }    

    public function showProfile($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('user.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id); // Assurez-vous que l'utilisateur existe ou retournez une erreur 404
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        // Mise à jour de l'utilisateur
        $user->update($validatedData);
        
        return redirect()->route('profile', ['user_id' => $user->id])
                         ->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidating the session.
        $request->session()->invalidate();

        // Regenerate the token for the session.
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté.');
    }
}
