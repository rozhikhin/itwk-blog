@extends('layouts.admin')
@section('title', __('blog.post_edit') )
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.post.index') }}">{{ __('blog.posts') }}</a></li>
        <li class="breadcrumb-item active">{{ __('blog.post_edit') }}</li>
    </ol>
@endsection
@section('content')
    <style>
        .custom-file .custom-file-label::after {
            content: "{{ __('blog.browse') }}";
        }
        input#inputFile {
            cursor: pointer;
        }
        .edit-image-preview {
            position: relative;
        }
        .edit-image-preview .image-remove-btn {
            display: block;
            position: absolute;
            visibility: hidden;
            width: 150px;
            bottom: 25px;
            left:175px;
            cursor: pointer;
            z-index: 1000;
        }
        .edit-image-preview .image-remove-btn:hover {
            visibility: visible;
        }
        .edit-image-preview img:hover ~ .image-remove-btn {
            visibility: visible;
        }
    </style>
    <div class="row mb-5">
        <div class="card col-12">
            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('admin.blog.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">{{ __('blog.title') }}</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $post->name) }}">
                        <p class="text-danger">
                            @error('name') {{ $message }} @enderror
                        </p>
                    </div>
                    @if($post->image)
                        <div class="form-group edit-image-preview">
                            <img src="{{ asset('storage/images/thumb') . '/' . $post->image }}" alt="Prewiew image">
                            <button data-href="{{ route('admin.blog.post.removeImage', $post->id) }}" type="button" class="btn btn-block bg-gradient-danger image-remove-btn"  data-image-remove="1" data-post-id="{{ $post->id }}" >Удалить</button>
                            <p class="text-danger">
                                <span class="image-remove-error"></span>
                            </p>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="content">{{ __('blog.content') }}</label>
                        <textarea id="content" name="content" >
                            {{ old('content', $post->content) }}
                        </textarea>
                        <p class="text-danger">
                            @error('name') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="main_image">{{ __('blog.main_image') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="inputFile">{{ __('blog.choose_file') }}</label>
                                <input type="file" class="custom-file-input" id="inputFile" name="image" value="{{ old('image'), '' }}">
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">{{ __('blog.upload') }}</span>
                            </div>
                        </div>
                        <p class="text-danger">
                            @error('image') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="category_id">{{ __('blog.category') }}</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $category->id == old('category_id', $post->category_id) ? "selected" : ""}}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-danger">
                            @error('category_id') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="tag_ids">{{ __('blog.tags') }}</label>
                        <select id="tag_ids" name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="{{ __('blog.select_tag') }}" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    value="{{ $tag->id }}"
                                    {{  is_array(old('tag_ids', $post->tags->pluck('id')->toArray()))
                                        &&
                                        in_array($tag->id, old('tag_ids', $post->tags->pluck('id')->toArray()))
                                        ? 'selected' : '' }}
                                >{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>

@endsection
