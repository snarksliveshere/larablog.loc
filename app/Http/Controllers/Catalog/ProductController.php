<?php

namespace App\Http\Controllers\Catalog;
use App\Events\onAddOrdersEvent;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Offer;
use App\OfferValue;
use App\Order;
use App\Product;
use App\ProductCategory;
use App\RelatedProduct;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Session;

class ProductController extends Controller
{



    public function getIndex($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
//        dd($category->id);
//        $products = Product::all()->where('category_id', $category->id)->paginate(3);
        $products = Product::where('category_id', $category->id)->paginate(3);


//        dd($products);
//        $products::paginate(3);
        return view('shop.index',['products' => $products, 'category' => $category]);
    }

    public function getCategory()
    {
        $categories = ProductCategory::paginate(6);
        return view('shop.category_product',compact('categories'));
    }

    public function show($category_slug, $product_slug)
    {
//        dd($category_slug);
        $product = Product::where('slug', $product_slug)->firstOrFail();
        $related = RelatedProduct::where('parent_id', $product->id)->get();
        $relatedOffers = [];
        if (isset($related[0])) {
            $first = $related[0];
            $offers = $first->values;
            foreach ($offers as $offer) {
                $relatedOffers[Offer::find($offer->offer_id)->name] = OfferValue::find($offer->offer_value_id)->value;
            }
        }

        return view('shop.show', compact('product', 'related', 'relatedOffers', 'category_slug'));
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

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function removeAll()
    {
        Session::forget('cart');
        return redirect()->route('main');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function cart(Request $request)
    {

        if (null !== $request->get('related_id')) {
            $product = RelatedProduct::find($request->get('related_id'));

        } else {
            $product = Product::find($request->get('product_id'));
        }

        if(null == $product) {
            return redirect()->back()->with('status', 'что-то не вижу такого id :)');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        dd($oldCart);

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
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
//        dd($data);
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
            'total' => $total,
            'user' => Auth::user()
        ]);
    }

    public function ajaxRelated()
    {
        if (\Illuminate\Support\Facades\Request::ajax()) {
            $id = \Illuminate\Support\Facades\Request::get('id');
//            return response()->json(array('msg'=> $msg), 200);
            $relatedProduct = RelatedProduct::find($id);
            $offers = $relatedProduct->values;
            $relatedOffers = [];
            foreach ($offers as $offer) {

                $relatedOffers[Offer::find($offer->offer_id)->name] = OfferValue::find($offer->offer_value_id)->value;
            }
            $arr = [];
            foreach ($relatedProduct->toArray() as $key => $item) {
                if ($item === null) continue;
                $arr[$key] = $item;
            }
            $arr['values'] = $relatedOffers;


            return response()->json($arr, 200);
        }
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email:email|required',
            'address' => 'required'
        ]);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            Event::fire(new onAddOrdersEvent($request, $cart));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');


            \Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('main')->with('status', 'Товар добавлен в корзину');
    }


}
