<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function bracelets(Request $request)
    {
        $query = Product::where('main_category_id', 2); // ID 2 pour les Bracelets

        if ($request->has('other_category_id') && $request->other_category_id) {
            $query->where('other_category_id', $request->other_category_id);
        }

        $products = $query->get();
        $categories = Category::all(); // Récupérer toutes les catégories

        return view('shop.bracelet', compact('products', 'categories'));
    }

    public function pendants(Request $request)
    {
        $query = Product::where('main_category_id', 1); // ID 1 pour les Pendentifs

        if ($request->has('other_category_id') && $request->other_category_id) {
            $query->where('other_category_id', $request->other_category_id);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('shop.pendant', compact('products', 'categories'));
    }

    public function stones(Request $request)
    {
        $query = Product::where('main_category_id', 3); // ID 3 pour les Pierres taillées

        if ($request->has('other_category_id') && $request->other_category_id) {
            $query->where('other_category_id', $request->other_category_id);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('shop.stone', compact('products', 'categories'));
    }

    public function minerals(Request $request)
    {
        $query = Product::where('main_category_id', 4); // ID 4 pour les Minéraux brutes

        if ($request->has('other_category_id') && $request->other_category_id) {
            $query->where('other_category_id', $request->other_category_id);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('shop.minerals', compact('products', 'categories'));
    }
}
