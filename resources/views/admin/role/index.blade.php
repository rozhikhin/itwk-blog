@extends('layouts.admin')
@section('title', __('auth.roles') )
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('blog.admin-panel') }}</a></li>
        <li class="breadcrumb-item active">{{ __('auth.roles') }}</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <a href="{{ route('admin.role.create') }}"
                   class="btn btn-success">{{ __('auth.role_new') }}</a>
            </div>

            <div class="card-body">
                @error('index_error_msg')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="dataTables_wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('auth.role_title') }}</th>
                                    <th>{{ __('auth.role_desc') }}</th>
                                    <th colspan="3">{{ __('auth.user_actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td style="width: 100px;">
                                            <div class="d-flex align-items-center justify-content-between mr-1 ml-1">
                                                <a href="{{ route('admin.role.show', $role->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.role.edit', $role->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('admin.role.destroy', $role->id) }}"
                                                          method="post" data-action="delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if(!in_array($role->id, [1, 2]))
                                                        <button type="button" class="btn text-primary p-0"
                                                                data-toggle="modal" data-target="#confirm-delete"><i
                                                                class="fas fa-trash"></i></button>
                                                        @endif
                                                    </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('auth.role_title') }}</th>
                                    <th>{{ __('auth.role_desc') }}</th>
                                    <th colspan="3">{{ __('auth.user_actions') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                {{ __('auth.paginate_info', [
                                                    'start' => ($roles->currentpage()-1)*$roles->perpage()+1,
                                                    'end' => $roles->currentpage()*$roles->perpage(),
                                                    'total' => $roles->total(),
                                                    ]) }}
                            </div>
                        </div>
                        <div class="col-7 d-flex justify-content-end">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
