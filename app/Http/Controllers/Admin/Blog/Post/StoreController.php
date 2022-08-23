<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Models\Blog\Post;
use App\services\ImageService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest, ImageService $imageService)
    {
        try {
            $input = $storeRequest->validated();
            if ($storeRequest->file('image')) {
                $imgName = $storeRequest->file('image')->store('', 'public');
                $input['image'] = $imgName;
                Post::firstOrCreate($input);

                $imageService->createThubnail($imgName);

                return redirect(route('admin.blog.post.index'));
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.store_error')])->withInput();
        }
    }
}
