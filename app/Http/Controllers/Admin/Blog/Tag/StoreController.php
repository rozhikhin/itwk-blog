<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Tag\StoreRequest;
use App\Models\Blog\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $input = $request->validated();
            Tag::firstOrCreate(
                $input
            );
            return redirect(route('admin.blog.tag.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Tag::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.store_error')])->withInput();
        }
    }
}
