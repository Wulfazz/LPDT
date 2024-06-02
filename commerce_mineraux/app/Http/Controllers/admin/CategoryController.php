<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $validatedData['type'] = 'other'; // Set the default type to 'other'

        Category::create($validatedData);

        return redirect()->route('admin.products.create')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('admin.products.create')->with('success', 'Catégorie modifiée avec succès.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.products.create')->with('success', 'Catégorie supprimée avec succès.');
    }
}
