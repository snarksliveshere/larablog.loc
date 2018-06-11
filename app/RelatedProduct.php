<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $fillable = ['imagePath','title','description','price', 'content','parent_id'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function values()
    {
        return $this->hasMany('App\OffersProduct', 'product_id');
    }

    public static function addValues($ids, $offers)
    {
        foreach ($ids as $ki => $val) {
            if ($val == null) {
                continue;
            }
            $value = new OffersProduct(['offer_id' => $ki, 'offer_value_id' => $val, 'product_id' => $offers->id ]);
            $offers->values()->save($value);
        }

    }
    public static function updateValues($ids, $related)
    {
        $offers = $related->values;

//dd(count($ids));
        foreach ($offers as $key => $offer) {
            if (isset($ids[$offer->offer_id])) {
                if($ids[$offer->offer_id] != $offer->offer_value_id) {
                    $offer->offer_value_id = $ids[$offer->offer_id];
                    $offer->save();
                }
                unset($ids[$offer->offer_id]);
            } else {
                $offer->delete();
            }


        }
//        dd($ids);
        if(count($ids)) {
            foreach ($ids as $ki => $item) {
                $value = new OffersProduct([
                    'offer_id' => $ki,
                    'offer_value_id' => $item,
                    'product_id' => $related->id]);
                $value->save();
            }
        }
        dd('fin');
        foreach ($ids as $ki => $val) {

            foreach ($offers as $offer) {
                if ($ki == $offer->offer_id) {
                    $offer->offer_value_id = $val;
                    $offer->save();
                }
                elseif ($ki != $offer->offer_id) {
                    $value = new OffersProduct([
                        'offer_id' => $ki,
                        'offer_value_id' => $val,
                        'product_id' => $related->id]);
                    $value->save();
                } else {
                    dd($offer->id);
//                    $offer->delete();
                }

            }

//            $value = new OffersProduct(['offer_id' => $ki, 'offer_value_id' => $val, 'product_id' => $offers->id ]);
//            $offers->values()->save($value);
        }

//        $offer = Offer::find($ids['id']);
//        $values = $offer->values;
//
//        foreach ($values as $ki => $value) {
//            if ( $ids['values'][$ki] != null) {
//                $value->value = $ids['values'][$ki];
//                $value->save();
//            } else {
//                $value->delete();
//            }
//        }

    }
    public static function add($fields)
    {
        $related = new static;
        $related->fill($fields);
        $related->save();
        if(isset($fields['set_status'])) {
            $related->status = 1;
            $related->save();
        }
        return $related;
    }
    public static function edit($fields, $relate)
    {

        $relate->fill($fields);
        $relate->save();
        if(isset($fields['set_status'])) {
            $relate->status = 1;
            $relate->save();
        }
        return $relate;
    }

}
