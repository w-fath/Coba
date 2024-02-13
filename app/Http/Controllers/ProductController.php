<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
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
        'brand_id',
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
        $brands = Brand::all(); // Mengambil semua data brand dari model Brand
        $categories = Category::all(); // Mengambil semua data category dari model Category
        return view('admin.products.add', compact('brands', 'categories'));
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
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
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

        // Pastikan $brand awalnya null
        $brand = null;

        // Jika ada brand_id yang diberikan
        if ($request->has('brand_id')) {
            // Cari brand berdasarkan ID
            $brand = Brand::find($request->brand_id);

            // Jika brand tidak ditemukan, kembalikan dengan pesan kesalahan
            if (!$brand) {
                return redirect()->back()->withInput()->withErrors(['brand_id' => 'Brand tidak valid.']);
            }
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
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('admin.product')->with('success', 'Produk berhasil ditambahkan.');
    }

}
