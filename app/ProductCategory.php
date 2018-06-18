<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use Sluggable;
    protected $fillable = ['imagePath','title','description', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    public static function add($fields)
    {
        $category = new static;
        $category->fill($fields);
        $category->save();

        return $category;
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
            Storage::delete('/images/' . $this->image);
        }
    }
    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.png';
        }

        return '/images/' . $this->image;
    }



}
