<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query("page");
        $size = $request->query("size");
        if(!$page)
            $page = 1;
        if(!$size)
            $size = 12;
        $order = $request->query("order");
        if(!$order)
            $order = -1;
        $o_colum = "";
        $o_order = "";
        switch($order)
        {
            case 1;
                $o_colum = "create_at";
                $o_order = "DESC";
                break;
            case 2;
                $o_colum = "create_at";
                $o_order = "ASC";
                break;
            case 3;
                $o_colum = "regular_price";
                $o_order = "ASC";
                break;
            case 4;
                $o_colum = "regular_price";
                $o_order = "DESC";
                break;
            default:
                $o_colum = "id";
                $o_order = "DESC";
        }
        $brands = Brand::orderBy('name','ASC')->get();
        $q_brands = $request->query("brands");
        $categories = Category::orderBy('name','ASC')->get();
        $q_categories = $request->query("categories");
        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500000";
        $from = explode(",",$prange)[0];
        $to =explode(",",$prange)[1];
        $products = Product::where(function($query) use($q_brands){
                            $query->whereIn('brand_id', explode(',', $q_brands))->orWhereRaw("'".$q_brands."'=''");
                            })
                            ->where(function($query) use($q_categories){
                            $query->whereIn('category_id', explode(',', $q_categories))->orWhereRaw("'".$q_categories."'=''");
                            })
                            ->whereBetween('regular_price',array($from,$to))
                            ->orderBy('created_at', 'DESC')->orderBy($o_colum, $o_order)->paginate($size);
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size, 'order'=>$order, 'brands'=>$brands, 'q_brands'=>$q_brands, 'categories'=>$categories,'q_categories'=>$q_categories, 'from'=>$from, 'to'=>$to]);
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $rproducts= Product::Where('slug','!=',$slug)->inRandomOrder('id')->get()->take(8);
        return view('details',['product'=>$product, 'rproducts'=>$rproducts]);
    }
    public function getCartAndWishlistCount()
    {
        $cartCount = Cart::instance("cart")->content()->count();
        $wishlistCount = Cart::instance("wishlist")->content()->count();
        return response()->json(['status' => 200, 'cartCount'=>$cartCount,'wishlistCount'=>$wishlistCount]);
    } 
}
