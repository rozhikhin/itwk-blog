<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($id)
    {
        echo $id . '<br>';
        return __METHOD__;
    }
}