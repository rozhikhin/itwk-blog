<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\StoreRequest;
use App\Models\Blog\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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
            Log::error($e->getMessage(), ['ID' => $category->id, 'Title' => $category->title, 'object' => Category::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.update_error')])->withInput();
        }
    }
}
