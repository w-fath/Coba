<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    protected $fillable = [
        'name', 
        'slug', 
        'short_description', 
        'description', 
        'regular_price', 
        'sale_price', 
        'SKU', 
        'stock_status', 
        'featured', 
        'quantity', 
        'image', 
        'category_id',
    ];
    
    

    public function generateSlug($name)
    {
        return Str::slug($name);
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.products.add', compact('categories'));
    }

    public function addProduct(Request $request)
{
    $request->validate([
        'name' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric|min:0',
        'sale_price' => 'required|numeric|min:0',
        'SKU' => 'required|unique:products,SKU',
        'stock_status' => 'required|in:instock,outofstock',
        'featured' => 'required|in:0,1',
        'quantity' => 'required|numeric|min:0',
        'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Memanggil metode generateSlug
    $slug = $this->generateSlug($request->name);

    // Inisialisasi $imagePath dengan null
    $imagePath = null;

    // Cek apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        // Jika ada, simpan gambar dan dapatkan path-nya
        $imagePath = $request->file('image')->store('image', 'public');
    }

    // Ganti 'images' dengan 'image' sesuai dengan kolom yang ada di database
    Product::create([
        'name' => $request->name,
        'slug' => $slug,
        'short_description' => $request->short_description,
        'description' => $request->description,
        'regular_price' => $request->regular_price,
        'sale_price' => $request->sale_price,
        'SKU' => $request->SKU,
        'stock_status' => $request->stock_status,
        'featured' => $request->featured,
        'quantity' => $request->quantity,
        'image' => $imagePath,  // Ubah 'images' menjadi 'image'
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('admin.product')->with('success', 'Produk berhasil ditambahkan.');
}

}
