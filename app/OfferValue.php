<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class OfferValue extends Model
{
    protected $fillable = ['name'];

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

    public function edit()
    {

    }

    public function remove()
    {

    }
}
