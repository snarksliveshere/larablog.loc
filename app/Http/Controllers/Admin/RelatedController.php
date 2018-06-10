<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use App\Product;
use App\RelatedProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RelatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $offersNames = Offer::all();
        $offers = [];

        foreach ($offersNames as $offer) {
            $values = $offer->values()->pluck('value','id');
            if (count($values)) {
                $offers[$offer->id] = $values;
            }
        }
//        dd($offers);
        return view('admin.related.create', compact('product', 'offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //        $ids = RelatedProduct::pluck('id')->all();
    //        dd($ids);

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'price' => 'required|integer'
        ]);

        $related = $request->all();

        $product = Product::find($request->parent_id);
        $product->hasRelated = 1;
        $product->save();

        $offersRelated = [];
        foreach ($related['name'] as $key => $name) {
            $offersRelated[$name] = $related['value_id'][$key];
        }
//        dd($offersRelated);
        foreach ($related as $ki => $rel) {
            if($ki == '_token') continue;
            if($rel == $product->{$ki}) {
                $related[$ki] = null;
            }
        }
        $relatedProduct = RelatedProduct::add($related);
//        dd($relatedProduct);
        $fillOffers = RelatedProduct::addValues($offersRelated, $relatedProduct);




        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(2);
        $product = Product::find($id);
        $values = $product->valValues()->get();

    }
    public function addOfferIndex($id)
    {
        dd(1);
        $fillOffers = [];
        foreach ($values as $value) {
            $offerName = Offer::find($value->offer_id);
            $fillOffers[] = $offerName->name;
            dd($fillOffers);
        }
        // вот так я получаю значения, но не  названия обложка, год издания и проч


        $offers = $product->getValue()->where('product_id', $id)->get(); // получил offer_values (хотя и все) - нужен where
        // и надо еще получить сам offer !
        dd($offers);
        $product = Product::with(['offerProducts'])->find($id);
//        dd($product);
        $offers = $product->offerValues;


        dd($offers);
        return view('admin.products.editOffers', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
