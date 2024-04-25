<?php

use Illuminate\Support\Facades\Route;

$validPages = ['home', 'store', 'contact', 'story'];
$validInfoTypes = ['terms', 'legal-notice'];

// Routes pour les pages principales
Route::get('/{page?}', function ($page = 'home') use ($validPages) {
    if (in_array($page, $validPages)) {
        return view('pages.' . $page);
    }
    return view('pages.default');
})->where('page', implode('|', $validPages));

// Routes pour les pages d'information
Route::get('/info/{type?}', function ($type = 'default') use ($validInfoTypes) {
    if (in_array($type, $validInfoTypes)) {
        return view('infos.' . $type);
    }
    return view('infos.default');
})->where('type', implode('|', $validInfoTypes));

