<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke($id)
    {
        echo $id . '<br>';
        return __METHOD__;
    }
}
