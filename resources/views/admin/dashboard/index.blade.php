@extends('layouts.admin')

@section('title', __('blog.dashboard') )

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item active">{{ __('blog.dashboard') }}</li>
    </ol>
@endsection

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>

                    <p>{{ __('auth.users') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">{{ __('auth.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $categoriesCount }}</h3>

                    <p>{{ __('blog.categories') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-navicon-round"></i>
                </div>
                <a href="{{ route('admin.blog.category.index') }}" class="small-box-footer">{{ __('auth.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $tagsCount }}</h3>

                    <p>{{ __('blog.tags') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetags"></i>
                </div>
                <a href="{{ route('admin.blog.tag.index') }}" class="small-box-footer">{{ __('auth.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $postsCount }}</h3>

                    <p>{{ __('blog.posts') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-compose"></i>
                </div>
                <a href="{{ route('admin.blog.post.index') }}" class="small-box-footer">{{ __('auth.more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
            <!-- /.row -->
@endsection
