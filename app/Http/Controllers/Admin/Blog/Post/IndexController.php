<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.blog.post.index', compact('posts'));
    }
}
