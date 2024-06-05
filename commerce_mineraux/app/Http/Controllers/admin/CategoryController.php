<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category([
            'category_name' => $request->input('category_name'),
            'type' => $request->input('type', 'other')
        ]);
        $category->save();
        return redirect()->route('admin.products.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->only(['category_name', 'type']));
        return redirect()->route('admin.products.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.products.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
