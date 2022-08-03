<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Tag\StoreRequest;
use App\Models\Blog\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request,Tag $tag)
    {
        try {
            $input = $request->validated();
            $tag->updateOrFail(
                $input
            );
            return redirect(route('admin.blog.tag.show', $tag->id));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $tag->id, 'Title' => $tag->title, 'object' => Tag::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.update_error')])->withInput();
        }
    }
}
