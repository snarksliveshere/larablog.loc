<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath','title','description','price'];

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }
    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getPrevious()
    {
        $productID = $this->hasPrevious();
        return self::find($productID);
    }
    public function getNext()
    {
        $productID = $this->hasNext();
        return self::find($productID);
    }
    public function related()
    {
        return self::all()->except($this->id);
    }
}
