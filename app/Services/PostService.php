<?php

namespace App\Services;

use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($input)
    {
        try {

            $tagIds = array_key_exists('tag_ids', $input) ? $input['tag_ids'] : [];
            if($tagIds) {cd
                unset($input['tag_ids']);
            }
            $image = array_key_exists('image', $input) ? $input['image'] : '';
            $input['image'] = '';
            if ($image) {
                $imgName = $image->store('', 'images');
                $input['image'] = $imgName;
                ImageService::createThumbnail($imgName);
            }
            $post = Post::firstOrCreate($input);
            $post->tags()->sync($tagIds);
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('blog.save_error')])->withInput();
        }

    }
    public function update($input, $post)
    {
        try {
            $tagIds = $input['tag_ids'];
            unset($input['tag_ids']);
            $imgName = '';
            if ($input['image']) {
                $imgName = $input['image']->store('', 'images');
                ImageService::createThumbnail($imgName);
            }
            $input['image'] = $imgName;
            $post->tags()->sync($tagIds);
            $post->update($input);
            return redirect(route('admin.blog.post.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.update_error')])->withInput();
        }

    }

}
