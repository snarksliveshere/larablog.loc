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
//dd($this->values);
        dd($ids);
//        dd($ids);
        foreach ($ids as $val) {
            echo $val->value;
//            $this->values()->create($val->value);
        }
//        if ($ids == null) { return; }

//        $this->values()->sync($ids);


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
