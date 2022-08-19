@extends('layouts.admin')
@section('title', __('blog.categories_add') )
@section('content')
    <style>
        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "{{ __('blog.browse') }}";
        }
        input#inputFile {
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="card col-12">

            <div class="card-body">

                <form action="{{ route('admin.blog.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('blog.title') }}</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name'), '' }}">
                        <p class="text-danger">
                            @if($errors->any())
                                {{$errors->first()}}
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('blog.content') }}</label>
                        <textarea id="content" name="content" >
                            {{ old('name'), '' }}
                        </textarea>
                        <p class="text-danger">
                            @if($errors->any())
                                {{$errors->first()}}
                            @endif
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
                            @if($errors->any())
                                {{$errors->first()}}
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('blog.category') }}</label>
{{--                        <input type="text" id="category_id" class="form-control" name="name" value="{{ old('category'), '' }}">--}}
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? "selected" : ""}}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-danger">
                            @if($errors->any())
                                {{$errors->first()}}
                            @endif
                        </p>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>
@endsection
