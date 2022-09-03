<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\RemoveImageRequest;
use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RemoveImageController extends Controller
{
    public function __invoke(RemoveImageRequest $removeImageRequest, Post $post)
    {
        try {
            if ($removeImageRequest->has('isRemoveImage')) {
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
