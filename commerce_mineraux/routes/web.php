<?php

use Illuminate\Support\Facades\Route;

$validPages = ['home', 'store', 'contact', 'story'];
$validInfoTypes = ['terms', 'legal-notice'];
$validShop = ['bracelet', 'minerals', 'pendant', 'stone'];
$validUser = ['cart', 'login', 'profile']; // Utilisation de noms plus clairs pour les routes utilisateur

// Routes pour les pages principales
Route::get('/{page?}', function ($page = 'home') use ($validPages) {
    if (in_array($page, $validPages)) {
        return view('pages.' . $page);
    }
    return view('pages.default');
})->where('page', implode('|', $validPages));

// Routes pour les pages d'information
Route::get('/info/{type?}', function ($type = 'terms') use ($validInfoTypes) {
    if (in_array($type, $validInfoTypes)) {
        return view('infos.' . $type);
    }
    return view('infos.default');
})->where('type', implode('|', $validInfoTypes));

// Routes pour les pages de boutique
Route::get('/shop/{item?}', function ($item = 'default') use ($validShop) {
    if (in_array($item, $validShop)) {
        return view('shop.' . $item);
    }
    return view('shop.default');
})->where('item', implode('|', $validShop));

// Routes pour les pages utilisateur
Route::get('/user/{action?}', function ($action = 'profile') use ($validUser) {
    if (in_array($action, $validUser)) {
        return view('user.' . $action); // Assurez-vous que les vues existent pour 'cart', 'login', 'profile'
    }
    return view('user.default'); // Fournir une vue par défaut pour les actions non valides
})->where('action', implode('|', $validUser));




use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');





use App\Http\Controllers\UserController;

// Route pour afficher le formulaire de connexion
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');

// Route pour traiter la connexion
Route::post('/login', [UserController::class, 'login'])->name('login');

// Route pour afficher le formulaire d'inscription
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');

// Route pour traiter l'inscription
Route::post('/register', [UserController::class, 'register'])->name('register');