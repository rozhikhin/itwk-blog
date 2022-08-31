<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\StoreRequest;
use App\Models\Blog\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
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
            Log::error($e->getMessage(), ['object' => Category::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('blog.store_error')])->withInput();
        }
    }
}
