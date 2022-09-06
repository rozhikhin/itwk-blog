<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest,  PostService $postService, Post $post)
    {
//        $input = $updateRequest->validated();
//        $postService->update($input, $post);
//        return redirect(route('admin.blog.post.index'));
    }
}
