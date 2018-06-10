<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use App\Product;
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
                $offers[$offer->name] = $values;
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
        dd($request->all());
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

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
