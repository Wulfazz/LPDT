<?php

use Illuminate\Support\Facades\Route;

// Route dynamique pour les pages principales
Route::get('/{page?}', function ($page = 'home') {
    $validPages = ['home', 'store', 'contact', 'story'];
    $viewPath = in_array($page, $validPages) ? 'pages.' . $page : 'pages.default';
    return view()->exists($viewPath) ? view($viewPath) : view('pages.default');
})->where('page', '^(?!info|terms|shipping|legal-notice|payments).*$'); // Exclut les routes d'information

// Route dynamique pour les informations
Route::get('/info/{type?}', function ($type = 'default') {
    $validInfoTypes = ['terms', 'shipping', 'legal-notice', 'payments'];
    $viewPath = in_array($type, $validInfoTypes) ? 'infos.' . $type : 'infos.default';
    return view()->exists($viewPath) ? view($viewPath) : view('infos.default');
});