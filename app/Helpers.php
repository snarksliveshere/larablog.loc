<?php
/**
 * Created by PhpStorm.
 * User: cheshirs
 * Date: 04.07.2018
 * Time: 17:19
 */

namespace App;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Helpers
{
    // picture block

    /**
     * @param $image
     * @param $obj
     */

    public static function uploadImage($image, $obj)
    {
        if ($image == null) { return; }
        static::removeImage($obj);
        $filename = $obj->id . '.' . strtolower($image->getClientOriginalExtension());
        static::setResolution($image, $obj, $filename);

        $path = 'images/' . strtolower(class_basename($obj)) . '/';

        $image->storeAs($path ,$filename);
        $fullPath = '/' . $path . $filename;

        (class_basename($obj) == 'Post') ? $obj->image = $fullPath : $obj->imagePath = $fullPath;

        $obj->save();
    }

    public static function removeImage($obj)
    {
        $img = (class_basename($obj) == 'Post') ? $obj->image : $obj->imagePath;
        if ($img != null) {
            Storage::delete($img);
        }
    }

    public static function setResolution($image, $obj, $filename)
    {
        $resolutionArray = [
            '430-340','95-95','600-600'
        ];
        foreach ($resolutionArray as $item) {
            $temp = explode('-',$item);
            list($width, $height) = $temp;

            $img = Image::make($image)->fit($width, $height, function($con){
                $con->upsize();
                $con->aspectRatio();
                }, 'center');

            $path = 'images/' . strtolower(class_basename($obj)) . '/';
            Storage::makeDirectory($path . $item);

            $img->save($path . $item . '/' . $filename);
        }

    }

}