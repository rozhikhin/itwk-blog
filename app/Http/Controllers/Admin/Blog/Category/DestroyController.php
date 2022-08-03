<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends Controller
{
    public function __invoke(Category $category)
    {
        try {
            $category->deleteOrFail();
            return redirect(route('admin.blog.category.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $category->id, 'Title' => $category->title, 'object' => Category::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.delete_error')])->withInput();
        }
    }
}
