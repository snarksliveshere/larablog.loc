<?php

namespace App\Http\Controllers\Catalog;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Offer;
use App\OfferValue;
use App\Product;
use App\RelatedProduct;
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
        $related = RelatedProduct::where('parent_id', $product->id)->get();
        $relatedOffers = [];
        if (isset($related[0])) {
            $first = $related[0];
            $offers = $first->values;
            foreach ($offers as $offer) {
                $relatedOffers[Offer::find($offer->offer_id)->name] = OfferValue::find($offer->offer_value_id)->value;
            }
        }

        return view('shop.show', compact('product', 'related', 'relatedOffers'));
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

    public function ajaxRelated()
    {
        if (\Illuminate\Support\Facades\Request::ajax()) {
            $msg = "This is a simple message.";
            $id = \Illuminate\Support\Facades\Request::get('id');
//            return response()->json(array('msg'=> $msg), 200);
            $relatedProduct = RelatedProduct::find($id);

            return response()->json($relatedProduct->price, 200);
        }
    }


}
