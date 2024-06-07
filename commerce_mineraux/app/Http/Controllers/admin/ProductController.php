<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('mainCategory', 'otherCategory');
        
        if ($request->filled('main_category_id')) {
            $query->where('main_category_id', $request->main_category_id);
        }

        if ($request->filled('other_category_id')) {
            $query->where('other_category_id', $request->other_category_id);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }
    
    public function create()
    {
        $mainCategories = Category::where('type', 'main')->get();
        $otherCategories = Category::where('type', 'other')->get();
        return view('admin.products.create', compact('mainCategories', 'otherCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'image_url' => 'required|url',
            'quantity_available' => 'required|integer',
            'main_category_id' => 'required|exists:categories,category_id',
            'other_category_id' => 'required|exists:categories,category_id',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
            'image_url' => $request->image_url,
            'quantity_available' => $request->quantity_available,
            'main_category_id' => $request->main_category_id,
            'other_category_id' => $request->other_category_id,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'image_url' => 'required|url',
            'quantity_available' => 'required|integer',
            'main_category_id' => 'required|exists:categories,category_id',
            'other_category_id' => 'required|exists:categories,category_id',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
