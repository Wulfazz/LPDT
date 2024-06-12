<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'type' => 'other', 
        ]);

        return redirect()->route('admin.products.create')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::find($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('admin.products.create')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.products.create')->with('success', 'Catégorie supprimée avec succès.');
    }
}
