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

    public function getRelatedProducts()
    {
       return $this->hasMany('App\RelatedProduct', 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
        return self::all()->where('status', 1)->except($this->id);
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

    public function offerProducts()
    {
        return $this->hasMany(OffersProduct::class);
    }

    public function getValue()
    {
        return $this->hasManyThrough('App\OfferValue', 'App\OffersProduct', 'offer_value_id', 'id');
    }

    public function valValues()
    {
        return $this->belongsToMany('App\OfferValue', 'offers_products', 'product_id', 'offer_value_id');
    }

    public function setCategory($id)
    {
        if ($id == null) { return; }

        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryTitle()
    {

        return ($this->category != null)
            ? $this->category->title
            : 'без категории';
    }
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function uploadImage($image, $obj)
    {
        if ($image == null) { return; }
        $this->removeImage();
        $filename = $obj->id . '.' . $image->extension();
        $path = 'images/' . strtolower(class_basename($obj));
        $fullPath =  $image->storeAs($path, $filename);
        $fullPath = '/' . $fullPath;
        $this->imagePath = $fullPath;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('images/' . $this->image);
        }
    }
    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.png';
        }

        return '/images/' . $this->image;
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }

}
