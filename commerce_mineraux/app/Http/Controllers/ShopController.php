<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function pendants()
    {
        $products = Product::where('main_category_id', 1)->get(); // ID 1 pour les Pendentifs
        \Log::info('Pendentifs Products: ' . $products->toJson());
        return view('shop.pendant', compact('products'));
    }

    public function bracelets()
    {
        $products = Product::where('main_category_id', 2)->get(); // ID 2 pour les Bracelets
        \Log::info('Bracelets Products: ' . $products->toJson());
        return view('shop.bracelet', compact('products'));
    }

    public function stones()
    {
        $products = Product::where('main_category_id', 3)->get(); // ID 3 pour les Pierres taillées
        \Log::info('Pierres taillées Products: ' . $products->toJson());
        return view('shop.stone', compact('products'));
    }

    public function minerals()
    {
        $products = Product::where('main_category_id', 4)->get(); // ID 4 pour les Minéraux brutes
        \Log::info('Minéraux brutes Products: ' . $products->toJson());
        return view('shop.minerals', compact('products'));
    }
}
