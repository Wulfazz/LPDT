<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

// Les valeurs pour les routes
$validPages = ['home', 'store', 'contact', 'story'];
$validInfoTypes = ['terms', 'legal-notice'];
$validUser = ['login', 'profile'];

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

// Routes pour les pages informations
Route::get('/info/{type?}', function ($type = 'terms') use ($validInfoTypes) {
    if (in_array($type, $validInfoTypes)) {
        return view('infos.' . $type);
    }
    return view('infos.default');
})->where('type', implode('|', $validInfoTypes));

// Routes pour le panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Routes pour les boutiques
Route::get('/shop/bracelet', [ShopController::class, 'bracelets'])->name('shop.bracelet');
Route::get('/shop/minerals', [ShopController::class, 'minerals'])->name('shop.minerals');
Route::get('/shop/pendant', [ShopController::class, 'pendants'])->name('shop.pendant');
Route::get('/shop/stone', [ShopController::class, 'stones'])->name('shop.stone');

// Routes pour les pages utilisateurs
Route::get('/user/{action?}', function ($action = 'profile') use ($validUser) {
    if (in_array($action, $validUser)) {
        return view('user.' . $action);
    }
    return view('user.default');
})->where('action', implode('|', $validUser));

// Route pour le formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes pour la connexion et enregistrement
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/profile/{user_id}', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::post('/profile/update/{user_id}', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Routes pour le panneau d'administration
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

// Routes pour gestion utilisateurs
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index')->middleware('auth');
Route::delete('/admin/users/{user_id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy')->middleware('auth');

// Gestion de produits
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index')->middleware('auth');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create')->middleware('auth');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store')->middleware('auth');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit')->middleware('auth');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update')->middleware('auth');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy')->middleware('auth');

// Gestion de catégorie
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store')->middleware('auth');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update')->middleware('auth');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy')->middleware('auth');
