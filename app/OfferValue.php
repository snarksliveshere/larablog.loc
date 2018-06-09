<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class OfferValue extends Model
{
    protected $fillable = ['value'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'value'
            ]
        ];
    }

    public function offers()
    {
        return $this->belongsTo(Offer::class);
    }



    public function add()
    {

    }

    public function edit($values)
    {
//       dd($values['id']);
//        $val = OfferValue::find($values['id'])->offers()->name;
//        dd($val);
    }

    public function remove()
    {

    }
}
