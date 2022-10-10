@extends('layouts.admin')
@section('title', __('blog.tag_add') )
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.tag.index') }}">{{ __('blog.tags') }}</a></li>
        <li class="breadcrumb-item active">{{ __('blog.tag_add') }}</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">

            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('admin.blog.tag.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('blog.title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title'), '' }}">
                    </div>
                    <p class="text-danger">
                        @error('title') {{ $message }} @enderror
                    </p>
                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>
@endsection
