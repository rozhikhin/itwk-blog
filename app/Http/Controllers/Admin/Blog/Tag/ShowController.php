<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.blog.tag.show', compact('tag'));
    }
}
