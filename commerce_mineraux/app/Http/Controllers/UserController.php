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
    private $recaptchaSecret = '6LcO1d8pAAAAADJ2ssRQIsmrVej3pKajGUzEmxKo';

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('profile', ['user_id' => Auth::id()]);
        }
        return view('user.login');
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

        // Vérifier si l'utilisateur existe déjà
        $existingUser = User::where('email', $validatedData['email'])->first();
        if ($existingUser) {
            Log::warning('Tentative d\'inscription avec un email déjà utilisé : ' . $validatedData['email']);
            return back()->withErrors(['email' => 'Cet email est déjà utilisé.'])->withInput();
        }

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Utilise automatiquement le mutateur pour hasher le mot de passe
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        Log::info('Utilisateur enregistré avec succès : ' . $user->email);

        return redirect()->route('login.form')
                         ->with('success', 'Inscription réussie ! Veuillez vous connecter avec votre nouvel identifiant.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->recaptchaSecret,
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $responseBody = json_decode($response->body(), true);

        if (!$responseBody['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'Erreur de reCAPTCHA. Veuillez réessayer.']);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            Log::warning('Tentative de connexion avec un email inexistant : ' . $credentials['email']);
            return back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à nos enregistrements.'])->withInput();
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            Log::warning('Mot de passe incorrect pour l\'email : ' . $credentials['email']);
            return back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à nos enregistrements.'])->withInput();
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            Log::info('Utilisateur connecté avec succès : ' . $user->email);
            return redirect()->route('profile', ['user_id' => Auth::id()])
                            ->with('success', 'Connexion réussie ! Bienvenue sur votre page de profil.');
        }

        Log::warning('Échec de la tentative de connexion pour l\'email : ' . $credentials['email']);
        return back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à nos enregistrements.'])->withInput();
    }

    public function showProfile($user_id)
    {
        if (Auth::id() == $user_id) {
            return view('user.profile', ['user' => Auth::user()]);
        }
        return redirect('/login')->withErrors('Vous n\'êtes pas autorisé à voir ce profil.');
    }

    public function updateProfile(Request $request, $user_id)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'current_password' => 'required|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];

        if (!empty($validatedData['new_password'])) {
            $user->password = Hash::make($validatedData['new_password']);
        }

        $user->save();

        return redirect()->route('profile', ['user_id' => $user->user_id])
                         ->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté.');
    }
}
