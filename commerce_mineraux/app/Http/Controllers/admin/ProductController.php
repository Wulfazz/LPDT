<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('mainCategory', 'categories')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $main_categories = Category::where('type', 'main')->get();
        $categories = Category::where('type', '!=', 'main')->get();
        return view('admin.products.create', compact('main_categories', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'image_url' => 'required|url',
            'quantity_available' => 'required|integer',
            'main_category_id' => 'required|exists:categories,category_id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,category_id'
        ]);

        $product = Product::create($validatedData);
        $product->categories()->attach($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $main_categories = Category::where('type', 'main')->get();
        $categories = Category::where('type', '!=', 'main')->get();
        return view('admin.products.edit', compact('product', 'main_categories', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'image_url' => 'required|url',
            'quantity_available' => 'required|integer',
            'main_category_id' => 'required|exists:categories,category_id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,category_id'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié avec succès.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
