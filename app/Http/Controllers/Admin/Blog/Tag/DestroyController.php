<?php

namespace App\Http\Controllers\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends Controller
{
    public function __invoke(Tag $tag)
    {
        try {
            $tag->deleteOrFail();
            return redirect(route('admin.blog.tag.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $tag->id, 'Title' => $tag->title, 'object' => Tag::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.delete_error')])->withInput();
        }
    }
}
