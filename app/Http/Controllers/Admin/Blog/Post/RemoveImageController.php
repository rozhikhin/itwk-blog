<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\RemoveImageRequest;
use App\Models\Blog\Post;
use App\Services\ImageService;

class RemoveImageController extends Controller
{
    public function __invoke(RemoveImageRequest $removeImageRequest, Post $post, ImageService $imageService)
    {
        return $imageService->removeImage($removeImageRequest, $post);
    }
}
