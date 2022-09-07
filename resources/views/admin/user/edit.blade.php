@extends('layouts.admin')
@section('title', __('auth.user_edit') )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('auth.user_name') }}</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        <p class="text-danger">
                            @error('name') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('auth.user_email') }}</label>
                        <input type="text" id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                        <p class="text-danger">
                            @error('email') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="role_id">{{ __('auth.user_role') }}</label>
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}"
                                    {{ $role->id == old('role_id', $user->role_id) ? "selected" : ""}}>
                                    {{ $role->title }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-danger">
                            @error('role_id') {{ $message }} @enderror
                        </p>
                    </div>


                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>

@endsection
