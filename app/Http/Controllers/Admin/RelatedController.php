<?php

namespace App\Http\Controllers\Admin;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

    public function addOfferIndex($id)
    {
        $product = Product::find($id);
        $values = $product->valValues()->get();
//        dd($values);
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
}
