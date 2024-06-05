<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('mainCategory', 'otherCategory')->get();
        $categories = Category::all();
    
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string',
            'image_url' => 'required|url',
            'quantity_available' => 'required|integer|min:0',
            'main_category_id' => 'required|exists:categories,category_id',
            'other_category_id' => 'required|exists:categories,category_id',
        ]);
    
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'image_url' => $request->input('image_url'),
            'quantity_available' => $request->input('quantity_available'),
            'main_category_id' => $request->input('main_category_id'),
            'other_category_id' => $request->input('other_category_id'),
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
