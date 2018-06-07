<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offer;
use App\OfferValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('values')->get();
        return view('admin.offers.index',[
            'offers' => $offers
        ]);
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
//        $offers = DB::table('offers')
//            ->join('offer_values', function($join){
//                $join->on('offers.id','offer_values.offer_id')
//                    ->where('offer_values.offer_id', $id);
//            })->get();

//        $offers = DB::table('offers')->leftJoin('offer_values', 'offers.id','offer_values.offer_id')->where('offer_values.offer_id', '=', $id)->get();
        // так я получу значения и само предложение по id
        $offer = Offer::find($id);
        $values = Offer::find($id)->values;
       //$offer;
//        dd($offer);
//        $offerName = Offer::find($id);
//        return view('admin.offers.edit', compact('offerName', 'offers'));
        return view('admin.offers.edit', compact('values', 'offer'));
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
//        dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',

        ]);

        $offer = Offer::find($id);
        $offer->edit($request->all());
        // вообще, это надо в OfferValue кидать, а не в Offer !
//        $offer->setOfferValues($request->all());
        $offerValues = new OfferValue();
        $offerValues->edit($request->all());

//        dd($request->get('values'));
        return redirect()->route('offers.index');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
