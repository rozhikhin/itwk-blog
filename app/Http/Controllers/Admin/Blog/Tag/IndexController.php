<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(10);

        return view('admin.blog.tag.index', compact('tags'));
    }
}
