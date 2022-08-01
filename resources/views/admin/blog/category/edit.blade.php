@extends('layouts.admin')
@section('title', __('blog.categories_add') )
@section('content')
    <div class="row">
        <div class="card col-12">

            <div class="card-body">

                <form action="{{ route('admin.blog.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">{{ __('blog.title') }}</label>
                        <input type="text" id="inputEstimatedBudget" class="form-control" name="title" value="{{ old('title', $category->title) }}">
                    </div>
                    <p class="text-danger">
                        @if($errors->any())
                            {{$errors->first()}}
                        @endif
                    </p>
                    <button type="submit" class="btn btn-success">{{ __('blog.save') }}</button>
                </form>
            </div>

        </div>
@endsection
