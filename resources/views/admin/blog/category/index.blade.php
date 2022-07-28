@php /** @var App\Models\Blog\Category $category */ @endphp

@extends('layouts.admin')

@section('content')
    @foreach($categories as $category)
        <p>{{ $category->title }}</p>
    @endforeach
@endsection
