<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffersProduct extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function offer()
    {
        return $this->belongsToMany('App\Offer');
    }
    public function offerValues()
    {
//        return $this->belongsTo('App\OfferValue');

    }
}
