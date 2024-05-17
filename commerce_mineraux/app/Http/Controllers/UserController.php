<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Clé secrète reCAPTCHA (à remplacer par votre propre clé)
    private $recaptchaSecret = '6LcO1d8pAAAAADJ2ssRQIsmrVej3pKajGUzEmxKo';

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('user.login');
    }

    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // Traite l'inscription d'un nouvel utilisateur
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

        User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        Log::info('User registered successfully: ' . $validatedData['email']);

        return redirect()->route('login.form')
                         ->with('success', 'Inscription réussie ! Veuillez vous connecter avec votre nouvel identifiant.');
    }

    // Gère la tentative de connexion de l'utilisateur
    public function login(Request $request)
    {
        // Valider les entrées du formulaire
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required'  // Ajouter la validation reCAPTCHA
        ]);

        // Valider reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->recaptchaSecret,
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $responseBody = json_decode($response->body(), true);

        if (!$responseBody['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'Erreur de reCAPTCHA. Veuillez réessayer.']);
        }

        // Supprimer la clé 'g-recaptcha-response' des credentials
        $credentials = $request->only('email', 'password');

        // Vérifier les informations d'identification utilisateur
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile', ['user_id' => Auth::id()])
                             ->with('success', 'Connexion réussie ! Bienvenue sur votre page de profil.');
        }

        Log::warning('Failed login attempt for ' . $credentials['email']);
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email'));
    }

    // Affiche le profil de l'utilisateur
    public function showProfile($user_id)
    {
        if (Auth::id() == $user_id) {
            return view('user.profile', ['user' => Auth::user()]);
        }
        return redirect('/login')->withErrors('Vous n\'êtes pas autorisé à voir ce profil.');
    }

    // Met à jour les informations de profil de l'utilisateur
    public function updateProfile(Request $request)
    {
        $user = Auth::user();  // Obtenez l'utilisateur actuellement connecté
    
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        $user->update($validatedData);
    
        // Assurez-vous de passer 'user_id' lors de la redirection
        return redirect()->route('profile', ['user_id' => $user->user_id])
                         ->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    // Déconnecte l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté.');
    }
}
