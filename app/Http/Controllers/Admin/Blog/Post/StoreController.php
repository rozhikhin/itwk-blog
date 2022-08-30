<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Models\Blog\Post;
use App\Services\ImageService;
use App\Services\PostService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest, PostService $postService)
    {
        $input = $storeRequest->validated();
        $postService->store($input);
        return redirect(route('admin.blog.post.index'));

    }
}
