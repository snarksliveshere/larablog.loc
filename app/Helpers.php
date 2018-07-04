<?php
/**
 * Created by PhpStorm.
 * User: cheshirs
 * Date: 04.07.2018
 * Time: 17:19
 */

namespace App;


class Helpers
{
    public static function uploadImage($image, $obj)
    {
        if ($image == null) { return; }
        self::removeImage($image);
        $filename = $obj->id . '.' . $image->extension();
        $path = 'images/' . strtolower(class_basename($obj));
        $fullPath =  $image->storeAs($path, $filename);
        $fullPath = '/' . $fullPath;
        $obj->imagePath = $fullPath;
        $obj->save();
    }

    public static function removeImage($image)
    {
        if ($image != null) {
            Storage::delete('images/' . $image);
        }
    }
}