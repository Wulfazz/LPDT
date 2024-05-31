<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'new_category' => 'required|string|max:255',
        ]);

        Category::create(['category_name' => $validatedData['new_category']]);

        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Catégorie supprimée avec succès.');
    }
}
