<?php

namespace App\Http\Controllers\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        try {
            $post->deleteOrFail();
            return redirect(route('admin.blog.post.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['ID' => $post->id, 'Title' => $post->title, 'object' => Post::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.delete_error')])->withInput();
        }
    }
}
