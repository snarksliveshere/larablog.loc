<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name', 'slug'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function values()
    {
        return $this->hasMany(OfferValue::class);
    }


    public function setOfferValues($ids)
    {
//        dd($ids);
        $offer = Offer::find($ids['id']);
        $values = $offer->values;
        if ($values->isEmpty()) {

            $this->addOfferValues($ids['values'], $offer);
            return redirect()->route('offers.index');
        }

        $valuesArray = $values->toArray();
        foreach ($ids['values'] as $key => $item) {
            if (isset($valuesArray[$key])) {
                $valueId = $valuesArray[$key]['id'];
//                dump($valueId);
                if ($item != null) {
                    $tempValue =  OfferValue::find($valueId);
                    $tempValue->value = $item;
                    $tempValue->save();

                } else {
                    $related = OffersProduct::where('offer_value_id', $valueId)->get();
                    if (isset($related) && (count($related) == 1)) {
                        $relProduct =  RelatedProduct::find($related[0]->product_id);
                        $relProduct->status = 0;
                        $relProduct->save();
                    }
                    foreach ($related as $relate) {
                        $relate->delete();
                    }
                    OfferValue::find($valueId)->delete();
//                    $value->delete();
                }
            } else {
                $offer = Offer::find($ids['id']);
                $value = new OfferValue(['value' => $item]);
                $offer->values()->save($value);
            }

        }
//        foreach ($values as $ki => $value) {
//            if ( $ids['values'][$ki] != null) {
//                dump('if');
////                dd($value->value);
//                $value->value = $ids['values'][$ki];
//                $value->save();
//            } else {
//                dump('else');
//                $related = OffersProduct::where('offer_value_id', $value->id)->get();
//
//                // если удаляемое значение ТП - единственное у продукта, то снимаем его с публикации
//
//                if (isset($related) && (count($related) == 1)) {
//                    $relProduct =  RelatedProduct::find($related[0]->product_id);
//                    $relProduct->status = 0;
//                    $relProduct->save();
//                }
//                foreach ($related as $relate) {
//                    $relate->delete();
//                }
//
//                $value->delete();
//
//            }
//        }
//        dd('end');
    }
    // TODO: как update slug?
    public function addOfferValues($ids, $offer)
    {

        foreach ($ids as $val) {
            if ($val == null) { continue; }
            $value = new OfferValue(['value' => $val]);
            $offer->values()->save($value);
        }
    }

    public static function add($fields)
    {
        $offer = new static;
        $offer->fill($fields);
        $offer->save();

        return $offer;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        
    }
    
    


}
