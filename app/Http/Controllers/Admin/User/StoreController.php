<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest, PostService $postService)
    {

//        $input = $storeRequest->validated();
//        $postService->store($input);
//        return redirect(route('admin.blog.post.index'));

    }
}
