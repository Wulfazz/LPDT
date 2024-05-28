<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    // Permet de montrer le formulaire de connexion
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('profile', ['user_id' => Auth::id()]);
        }
        return view('user.login');
    }

    // Permet de montrer le formulaire d'inscription 
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // Gestion du formulaire d'inscription
    public function register(Request $request)
    {
        // Vérifier que les données remplissent les conditions
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Hash du mot de passe avec log pour bonne vérification dans les logs
        $hashedPassword = Hash::make($validatedData['password']);
        Log::info('Mot de passe haché avant enregistrement : ' . $hashedPassword);

        // Création de l'utilisateur avec les informations précédentes, 
        // enregistrement dans la base de données
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        Log::info('Utilisateur enregistré avec succès : ' . $user->email);
        Log::info('Mot de passe enregistré dans la base de données : ' . $user->password);

        // On renvoie directement à la page de connexion avec un message pour confirmer l'inscription
        return redirect()->route('login.form')
                         ->with('success', 'Inscription réussie ! Veuillez vous connecter avec votre nouvel identifiant.');
    }

    // Gestion du formulaire de connexion
    public function login(Request $request)
    {
        // Il faut forcément entrer un email et un mot de passe 
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info('Tentative de connexion pour l\'email : ' . $credentials['email']);

        // Vérification de l'email indiqué
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            Log::warning('Aucun utilisateur trouvé pour l\'email : ' . $credentials['email']);
            return back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à nos enregistrements.'])->withInput();
        }

        // Vérification du hashage des mots de passe
        Log::info('Mot de passe haché pour vérification : ' . $user->password);
        Log::info('Mot de passe en clair fourni : ' . $request->password);
        $passwordCheck = Hash::check($request->password, $user->password);
        Log::info('Résultat de la vérification du mot de passe : ' . ($passwordCheck ? 'vrai' : 'faux'));

        // Vérification du mot de passe
        if ($passwordCheck && Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            Log::info('Utilisateur connecté avec succès : ' . Auth::user()->email);
            // Si connexion réussie, redirection vers la page profile
            return redirect()->route('profile', ['user_id' => Auth::id()])
                             ->with('success', 'Connexion réussie ! Bienvenue sur votre page de profil.');
        }

        Log::warning('Échec de la tentative de connexion pour l\'email : ' . $credentials['email']);
        return back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à nos enregistrements.'])->withInput();
    }

    // Permet de montrer les données du profil de l'utilisateur
    public function showProfile($user_id)
    {
        Log::info('Affichage du profil pour l\'utilisateur ID : ' . $user_id);
        $user = User::findOrFail($user_id);
        return view('user.profile', compact('user'));
    }

    // Permet de mettre à jour le profil
    public function updateProfile(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
    
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

    // Permet la déconnection de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté.');
    }
}
