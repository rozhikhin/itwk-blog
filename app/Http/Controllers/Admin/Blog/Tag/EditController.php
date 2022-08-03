<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.blog.tag.edit', compact('tag'));
    }
}
