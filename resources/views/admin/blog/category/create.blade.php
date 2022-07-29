@extends('layouts.admin')
@section('title', __('blog.categories_add') )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <form action="{{ route('admin.blog.category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('blog.categories_title') }}</label>
                        <input type="text" id="inputEstimatedBudget" class="form-control" name="title">
                    </div>
                    <p class="text-danger">
                        @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </p>
                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

            <div class="card-body">

            </div>

        </div>
@endsection
