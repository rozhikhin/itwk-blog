<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\directoryExists;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
        try {
            $input = $storeRequest->validated();
            if ($storeRequest->file('image')) {
                $imgName = $storeRequest->file('image')->store('', 'public');
                $input['image'] = $imgName;
                Post::firstOrCreate($input);

//                Cretate thumnails
                $path = Storage::disk('public')->path($imgName);
                $width = 200;
                $height = 200;
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
                imagepng($image_p, Storage::path('thumb') . DIRECTORY_SEPARATOR . $imgName);
                imagedestroy($image_p);
                imagedestroy($image);

                return redirect(route('admin.blog.post.index'));
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.store_error')])->withInput();
        }
    }
}
