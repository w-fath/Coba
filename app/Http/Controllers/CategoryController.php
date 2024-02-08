<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        session()->flash('massage','Category created successfully');
        return redirect()->route('admin.category');
    }

    //Edit

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'slug' => 'required|unique:categories,slug,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        
        session()->flash('success', 'Category updated successfully');

        return redirect()->route('admin.category');
    }
    //Hapus
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Menambahkan pesan flash
        session()->flash('success', 'Category deleted successfully');

        return redirect()->route('admin.category');
    }
}
