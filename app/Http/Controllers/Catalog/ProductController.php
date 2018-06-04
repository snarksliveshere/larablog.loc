<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{



    public function getIndex()
    {
        $products = Product::paginate(3);
        return view('shop.index',['products' => $products]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('shop.show', compact('product'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $data = [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ];
        return view('shop.shopping-cart',$data);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',[
            'total' => $total
        ]);
    }


}
