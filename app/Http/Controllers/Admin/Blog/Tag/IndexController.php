<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
//        return csrf_token();
        return __METHOD__;
    }
}
