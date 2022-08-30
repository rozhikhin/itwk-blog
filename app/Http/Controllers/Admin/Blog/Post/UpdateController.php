<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Blog\Post;
use App\Services\PostService;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest,  PostService $postService, Post $post)
    {
        $input = $updateRequest->validated();
        $postService->update($input, $post);
        return redirect(route('admin.blog.post.index'));
    }
}
