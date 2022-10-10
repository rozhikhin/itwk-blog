@extends('layouts.admin')
@section('title', __('auth.role_show', ['title' => $role->title]) )
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">{{ __('auth.roles') }}</a></li>
        <li class="breadcrumb-item active">{{ __('auth.role_show', ['title' => $role->title]) }}</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header d-flex">
                <a href="{{ route('admin.role.edit', $role->id)}}" class="btn btn-success">{{ __('auth.edit') }}</a>
                @if(!in_array($role->id, [1, 2]))
                    <form action="{{ route('admin.role.destroy', $role->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirm-delete">{{ __('auth.destroy') }}</button>
                    </form>
                @endif
            </div>

            <div class="card-body">
                <div class="dataTables_wrapper"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $role->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('auth.role_title') }}</td>
                                        <td>{{ $role->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('auth.role_desc') }}</td>
                                        <td>{{ $role->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
