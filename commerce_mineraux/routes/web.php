<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;

// Définir les pages valides pour les différentes sections
$validPages = ['home', 'store', 'contact', 'story'];
$validInfoTypes = ['terms', 'legal-notice'];
$validShop = ['bracelet', 'minerals', 'pendant', 'stone'];
$validUser = ['cart', 'login', 'profile'];

// Routes pour les pages principales
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/{page?}', function ($page = 'home') use ($validPages) {
    if (in_array($page, $validPages)) {
        return view('pages.' . $page);
    }
    return view('pages.default');
})->where('page', implode('|', $validPages))->name('home');

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
        return view('user.' . $action);
    }
    return view('user.default');
})->where('action', implode('|', $validUser));

// Route pour le formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes pour l'authentification et la gestion des utilisateurs
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/profile/{user_id}', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::post('/profile/update/{user_id}', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Route pour le tableau de bord admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Routes pour la gestion des utilisateurs
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::delete('/admin/users/{user_id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

// Routes pour les produits
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::post('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

// Routes pour les catégories
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
