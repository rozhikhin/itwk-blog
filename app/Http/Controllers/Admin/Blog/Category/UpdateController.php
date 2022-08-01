<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blob\Category\StoreRequest;
use App\Models\Blog\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Category $category)
    {
        try {
            $input = $request->validated();
            $category->updateOrFail(
                $input
            );
            return redirect(route('admin.blog.category.show', $category->id));
        } catch (QueryException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()])->withInput();
        }
    }
}
