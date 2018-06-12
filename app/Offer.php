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
        $offer = Offer::find($ids['id']);
        $values = $offer->values;
        if ($values->isEmpty()) {

            $this->addOfferValues($ids['values'], $offer);
            return redirect()->route('offers.index');
        }

        foreach ($values as $ki => $value) {
            if ( $ids['values'][$ki] != null) {
                $value->value = $ids['values'][$ki];
                $value->save();
            } else {
                $related = OffersProduct::where('offer_value_id', $value->id)->get();
                foreach ($related as $relate) {
                    $relate->delete();
                }
                // TODO: тут у меня есть нестыковка, связанная с товарами - я так могу удалить последнее преложение у товара, а он останется в related_products, но это чуть позже

                $value->delete();

            }
        }
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
