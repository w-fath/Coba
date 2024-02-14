<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brands.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
        ]);

        Brand::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        session()->flash('massage','Brand created successfully');
        return redirect()->route('admin.brand');
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $id,
            'slug' => 'required|unique:brands,slug,' . $id,
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        
        session()->flash('success', 'Brand updated successfully');

        return redirect()->route('admin.brand');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        session()->flash('success', 'Brand deleted successfully');

        return redirect()->route('admin.brand');
    }
}
