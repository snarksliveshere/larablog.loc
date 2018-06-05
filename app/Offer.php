<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name'];

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
        $this->hasMany(OfferValue::class);
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
