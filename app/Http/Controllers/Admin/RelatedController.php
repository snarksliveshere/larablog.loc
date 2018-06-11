<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use App\OffersProduct;
use App\OfferValue;
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
            'price' => 'required|integer',
            'value_id' => 'required'
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
// TODO: вопрос пока с картинкой, но это пока что не актуально



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
    public function edit($slug)
    {
        $related = RelatedProduct::where('slug', $slug)->firstOrFail();
        $product = Product::find($related->parent_id);
        $offerValues = $related->values;
        //      забираем относящиеся к данному связанному товару свойства
        $productOffers = [];
        foreach ($offerValues as $offer) {
                $val = OfferValue::where('id',$offer->offer_value_id)->firstOrFail()->only('value');
            $productOffers[$offer->offer_id] = $val['value'];

        }
//        dd($productOffers);
        // а это все товары
        $offersNames = Offer::all();
        $offers = [];

        foreach ($offersNames as $offer) {
            $values = $offer->values()->pluck('value','id');
            if (count($values)) {
                $offers[$offer->id] = $values;
            }
        }
//        dd($offers);
        return view('admin.related.edit', compact('product', 'offers', 'productOffers', 'related'));


    }

    public function editList($id)
    {
        $product = Product::find($id);
        $related = $product->getRelatedProducts()->pluck('title', 'slug');
//        dd($related);
        return view('admin.related.edit_list', compact('related'));

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
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'price' => 'required|integer',
            'value_id' => 'required'
        ]);

        $requestRelated = $request->all();
        $relate = RelatedProduct::find($id);
//        dd($relate);
         $offersRelated = [];
        foreach ($requestRelated['name'] as $key => $name) {
            $offersRelated[$name] = $requestRelated['value_id'][$key];
        }
//        dd($offersRelated);
        foreach ($requestRelated as $ki => $rel) {
            if($rel == $relate->{$ki}) {
                unset($requestRelated[$ki]);
            } else {
                $requestRelated[$ki] = $rel;
            }
        }
//        dd($offersRelated);

        $relatedProduct = RelatedProduct::edit($requestRelated, $relate);
//        dd($relatedProduct);
        $fillOffers = RelatedProduct::updateValues($offersRelated, $relatedProduct);
// TODO: вопрос пока с картинкой, но это пока что не актуально



//        return redirect()->route('products.index');
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
