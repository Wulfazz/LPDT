<?php

use Illuminate\Support\Facades\Route;

// Route pour la page d'accueil
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/store', function () {
    return view('pages.store');
})->name('store');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/terms', function () {
    return view('infos.terms');
})->name('terms');

Route::get('/shipping', function () {
    return view('infos.shipping');
})->name('shipping');

Route::get('/legal-notice', function () {
    return view('infos.legal-notice');
})->name('legal-notice');

Route::get('/payments', function () {
    return view('infos.payments');
})->name('payments');

// Route générique pour gérer le contenu basé sur le paramètre 'type'
Route::get('/page', function () {
    $type = request('type', 'default');
    // Supposant que chaque type correspond à un fichier de vue dans le dossier 'pages'
    $viewFile = 'pages.' . $type; // Construit le chemin de la vue, par ex. 'pages.contentA'

    // Vérifie si la vue existe pour éviter une erreur en chargeant une vue inexistante
    if (view()->exists($viewFile)) {
        return view($viewFile);
    } else {
        // Retourne une vue par défaut ou une page d'erreur
        return view('pages.default');
    }
});

// Route générique pour gérer le contenu basé sur le paramètre 'type'
Route::get('/info', function () {
    $type = request('type', 'default');
    // Supposant que chaque type correspond à un fichier de vue dans le dossier 'pages'
    $viewFile = 'infos.' . $type; // Construit le chemin de la vue, par ex. 'pages.contentA'

    // Vérifie si la vue existe pour éviter une erreur en chargeant une vue inexistante
    if (view()->exists($viewFile)) {
        return view($viewFile);
    } else {
        // Retourne une vue par défaut ou une page d'erreur
        return view('infos.default');
    }
});