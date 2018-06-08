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
        $offer->values()->delete();
        foreach ($ids['values'] as $val) {
            if ($val == null) { continue; }
            $value = new OfferValue(['value' => $val]);
            $offer->values()->save($value);
        }
    }

    public function add()
    {
        
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
