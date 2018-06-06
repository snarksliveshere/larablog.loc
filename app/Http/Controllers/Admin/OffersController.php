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


//        $offers = Offer::with('values')->get(); что-то неполучается
        $offers = DB::table('offers')
            ->leftJoin('offer_values', 'offers.id','offer_values.offer_id')->get();
        $offersArr = [];
        foreach ($offers as $offer) {

                $offersArr[$offer->name][$offer->id] = $offer;

        }
//        foreach ($offers as $offer) {
//
//                $offersArr[$offer->offer_id][$offer->name][$offer->id] = $offer;
//
//        }
//        dd($offersArr);
        return view('admin.offers.index',[
            'offers' => $offersArr
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

        $offers = DB::table('offers')->leftJoin('offer_values', 'offers.id','offer_values.offer_id')->where('offer_values.offer_id', '=', $id)->get();
        $offerName = Offer::find($id);
        return view('admin.offers.edit', compact('offerName', 'offers'));
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
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',

        ]);

        $offer = Offer::find($id);
        $offer->edit($request->all());
        $offer->setOfferValues($request->get('values'));

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
