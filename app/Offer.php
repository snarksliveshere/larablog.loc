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

        foreach ($values as $ki => $value) {
            if ( $ids['values'][$ki] != null) {
                $value->value = $ids['values'][$ki];
                $value->save();
            } else {
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
//        $post->user_id = \Auth::user()->id;
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
