<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function createThumbnail($imgName)
    {
        $height = config('image.thumb_height');
        $width = config('image.thumb_width');

        //                Cretate thumnails
        $path = Storage::disk('images')->path($imgName);

        list($width_orig, $height_orig) = getimagesize($path);
        $ratio_orig = $width_orig/$height_orig;
        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }

        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromstring(file_get_contents($path));;
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagepng($image_p, Storage::disk('images')->path('thumb') . DIRECTORY_SEPARATOR . $imgName);
        imagedestroy($image_p);
        imagedestroy($image);

    }
}
