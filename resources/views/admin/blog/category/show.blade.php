@extends('layouts.admin')
@section('title', __('blog.categories_show', ['name' => $category->title]) )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header d-flex">
                <a href="{{ route('admin.blog.category.edit', $category->id)}}" class="btn btn-success">{{ __('blog.edit') }}</a>
                <form action="{{ route('admin.blog.category.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirm-delete">{{ __('blog.destroy') }}</button>
                </form>
            </div>

            <div class="card-body">
                <div class="dataTables_wrapper"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $category->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $category->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
