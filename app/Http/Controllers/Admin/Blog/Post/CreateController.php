<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog.post.create', compact('categories', 'tags'));
    }
}
