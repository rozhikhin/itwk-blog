<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blob\Category\StoreRequest;
use App\Http\Requests\Admin\Blob\Category\UpdateRequest;
use App\Models\Blog\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $input = $request->validated();
            Category::firstOrCreate(
                $input
            );
            return redirect(route('admin.blog.category.index'));
        } catch (QueryException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()])->withInput();
        }
    }
}
