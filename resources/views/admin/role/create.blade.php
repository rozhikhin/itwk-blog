@extends('layouts.admin')
@section('title', __('auth.role_add') )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('admin.role.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('auth.role_title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title')}}">
                        <p class="text-danger">
                            @error('title') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('auth.role_desc') }}</label>
                        <input type="text" id="description" class="form-control" name="description" value="{{ old('description')}}">
                        <p class="text-danger">
                            @error('description') {{ $message }} @enderror
                        </p>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('auth.save') }}</button>
                </form>
            </div>

        </div>

@endsection
