<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems' => $cartItems]);

    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $price)->associate('App\Models\Product');
        return redirect()->back()->with('massage','Succsess ! Item telah ditambahkan');
    } 
    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
    public function getWishlistProducts()
    {
        $items = Cart::instance("wishlist")->content();
        return view('wishlist',['items'=>$items]);
    }
}
