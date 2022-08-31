@extends('layouts.admin')
@section('title', __('blog.tag_edit') )
@section('content')
    <div class="row">
        <div class="card col-12">

            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('admin.blog.tag.update', $tag->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">{{ __('blog.title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $tag->title) }}">
                    </div>
                    <p class="text-danger">
                        @error('title') {{ $message }} @enderror
                    </p>
                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>
@endsection
