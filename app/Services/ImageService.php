<?php

namespace App\Services;

use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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

    public function removeImage($removeImageRequest, $post)
    {
        try {
            if ($removeImageRequest->has('isRemoveImage')) {
                if (Storage::disk('images')->exists($post->image)) {
                    Storage::disk('images')->delete($post->image);
                }
                if (Storage::disk('images')->exists('thumb/' . $post->image)) {
                    Storage::disk('images')->delete('thumb/' . $post->image);
                }
                $post->image = null;
                $post->save();
                return response()->json([
                    'result' => 'success',
                    'post_id' => $post->id,
                ]);
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $post->id, 'Title' => $post->title, 'object' => Post::class] );
            return response()->json([
                'error' => 'true',
                'message' => __('blog.delete_image_error'),
            ]);
        }
    }
}
