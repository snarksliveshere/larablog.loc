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
use Mockery\Exception;

class Helpers
{
    // picture block

    // папка для изображений
    protected static $imagesDir = 'images/';

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

        $isDir = in_array(static::$imagesDir, Storage::directories('/'));

        ($isDir) ?: Storage::makeDirectory(static::$imagesDir);

        $path = static::$imagesDir  . strtolower(class_basename($obj)) . '/';

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
            '430-340','95-95','960','315-315','295-165','315-177'
        ];
        foreach ($resolutionArray as $item) {
            $temp = explode('-',$item);
            if(count($temp) == 2) {
                list($width, $height) = $temp;
            } else {
                $width = $temp[0];
                $height = null;
            }

            $img = Image::make($image)->fit($width, $height, function($con){
                $con->upsize();
                $con->aspectRatio();
                }, 'center');

            $path = static::$imagesDir  . strtolower(class_basename($obj)) . '/';
            Storage::makeDirectory($path . $item);

            $img->save($path . $item . '/' . $filename);
        }

    }

    public static function getResizeImage($resolution, $obj)
    {

        try {

            if ( (class_basename($obj)) == 'Post' ? $obj->image == null : $obj->imagePath == null ) {
                return static::$imagesDir . 'no-image.jpg';
            }
            $str = static::$imagesDir .  strtolower(class_basename($obj)) .'/' . $resolution . '/' . $obj->id . '.jpg';

            return $str;

        } catch (Exception $e) {
            return 'неподходящее разрешение' . $e;
        }

    }

}