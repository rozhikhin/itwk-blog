<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blob\Category\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        dd($request);
        return __METHOD__;
    }
}
