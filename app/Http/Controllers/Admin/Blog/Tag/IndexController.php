<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use function Termwind\render;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.blog.tag.index');
    }
}
