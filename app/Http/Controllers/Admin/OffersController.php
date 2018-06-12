<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offer;
use App\OffersProduct;
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
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->get('values'));
        $this->validate($request,[
            'name' => 'required',
        ]);
        $offer = Offer::add($request->all());
        $offer->addOfferValues($request->get('values'), $offer);
//        dd($offer);
//        $post = Post::add($request->all());
//        $post->uploadImage($request->file('image'));
//        $post->setCategory($request->get('category_id'));
//        $post->setTags($request->get('tags'));
//        $post->toggleStatus($request->get('status'));
//        $post->toggleFeatured($request->get('is_featured'));
        return redirect()->route('offers.index');
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
        $offer = Offer::find($id);
        $values = Offer::find($id)->values;

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
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',

        ]);

        $offer = Offer::find($id);
        $offer->edit($request->all());
        $offer->setOfferValues($request->all());
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
        // TODO: та же вещь и с related products если уничтожается последняя запись. тут явно надо сгруппировать эти сущности
        $offer = Offer::find($id);
        $related = OffersProduct::where('offer_id', $offer->id)->get();
        foreach ($related as $relate) {
            $relate->delete();
        }
        // TODO: тут у меня есть нестыковка, связанная с товарами - я так могу удалить последнее преложение у товара, а он останется в related_products, но это чуть позже
        $offer->values()->delete();
        $offer->delete();
        return redirect()->route('offers.index');
    }
}
