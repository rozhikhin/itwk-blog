@extends('layouts.admin')
@section('title', __('auth.role_edit') )
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">{{ __('auth.roles') }}</a></li>
        <li class="breadcrumb-item active">{{ __('auth.role_edit') }}</li>
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
                <form action="{{ route('admin.role.update', $role->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                    <div class="form-group">
                        <label for="title">{{ __('auth.role_title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $role->title) }}">
                        <p class="text-danger">
                            @error('title') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('auth.role_desc') }}</label>
                        <input type="text" id="description" class="form-control" name="description" value="{{ old('email', $role->description) }}">
                        <p class="text-danger">
                            @error('description') {{ $message }} @enderror
                        </p>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('auth.save') }}</button>
                </form>
            </div>

        </div>

@endsection
