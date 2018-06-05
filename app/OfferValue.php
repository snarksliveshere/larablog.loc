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
