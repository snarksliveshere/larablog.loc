<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath','title','description','price', 'content'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    const IS_DRAFT = 0;
    const  IS_PUBLIC = 1;

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

    public function setDraft()
    {
        $this->status = Product::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Product::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public static function add($fields)
    {
        $product = new static;
        $product->fill($fields);
        $product->user_id = \Auth::user()->id;
        $product->save();

        return $product;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

    public function uploadImage($image)
    {
        if ($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('images', $filename);
        $this->imagePath = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('images/' . $this->image);
        }
    }
}
