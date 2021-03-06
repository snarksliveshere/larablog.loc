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

    public function offers()
    {
        return $this->belongsToMany(Offer::class,'offers_products', 'product_id', 'offer_id');
    }

    public function vals()
    {
        return $this->belongsToMany(OfferValue::class,'offers_products', 'product_id', 'offer_value_id');
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

    public static function deleteRelatedProducts($related)
    {
        $allRelated = RelatedProduct::where('parent_id', $related->parent_id)->get();

        if (count($allRelated) == 1) {
            $product = Product::find($related->parent_id);
            $product->hasRelated = 0;
            $product->save();
        }
        $values = $related->values;
        foreach ($values as $value) {
            $value->delete();
        }
        $related->delete();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.png';
        }

        return '/images/' . $this->image;
    }

    public static function showRelated($related)
    {
        $relatedOffers = [];
        if (isset($related[0])) {
            $first = $related[0];
            $first = $first->with(['vals' => function ($q) {
                                $q->select('offer_values.id','offer_values.offer_id', 'value');}])
                            ->with(['offers' => function ($q) {
                                $q->select('offers.id', 'name');}])->firstOrFail();
            foreach ($first->offers as $key => $offer) {
                $relatedOffers[$offer->name] = $first->vals[$key]->value;
            }

//            dd($relatedOffers);
        }

        return $relatedOffers;
    }
}
