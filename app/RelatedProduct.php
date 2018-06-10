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

}
