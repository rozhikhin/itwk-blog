<?php

namespace App\Services;

use App\Models\Blog\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PostService
{
    public function getNullableData($input): array
    {
        $tagIds = array_key_exists('tag_ids', $input) ? $input['tag_ids'] : [];
        if($tagIds) {
            unset($input['tag_ids']);
        }
        $image = array_key_exists('image', $input) ? $input['image'] : '';
        if ($image) {
            $imgName = $image->store('', 'images');
            $input['image'] = $imgName;
            ImageService::createThumbnail($imgName);
        }
        return [$input, $tagIds];
    }

    public function store($input)
    {
        try {
            list($input, $tagIds) = $this->getNullableData($input);
            $post = Post::firstOrCreate($input);
            $post->tags()->attach($tagIds);
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['index_error_msg' => __('blog.save_error')])->withInput();
        }

    }

    public function update($input, $post)
    {
        try {
            list($input, $tagIds) = $this->getNullableData($input);
            $post->tags()->sync($tagIds);
            $post->update($input);
        } catch (QueryException $e) {
            Log::error($e->getMessage(), ['object' => Post::class] );
            return Redirect::back()->withErrors(['msg' => __('blog.update_error')])->withInput();
        }

    }

}
