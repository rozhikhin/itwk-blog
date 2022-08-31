<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Services\PostService;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest, PostService $postService)
    {

        $input = $storeRequest->validated();
        $postService->store($input);
        return redirect(route('admin.blog.post.index'));

    }
}
