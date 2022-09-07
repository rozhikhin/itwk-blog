@extends('layouts.admin')
@section('title', __('auth.users') )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <a href="{{ route('admin.user.create') }}"
                   class="btn btn-success">{{ __('auth.user_new') }}</a>
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
                                    <th>{{ __('auth.user_name') }}</th>
                                    <th>{{ __('auth.user_email') }}</th>
                                    <th>{{ __('auth.user_role') }}</th>
                                    <th colspan="3">{{ __('auth.user_actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role)
                                                {{ $user->role->title }}
                                            @endif
                                        </td>
                                        <td style="width: 100px;">
                                            <div class="d-flex align-items-center justify-content-between mr-1 ml-1">
                                                <a href="{{ route('admin.user.show', $user->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                      method="post" data-action="delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn text-primary p-0"
                                                            data-toggle="modal" data-target="#confirm-delete"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('auth.user_name') }}</th>
                                    <th>{{ __('auth.user_email') }}</th>
                                    <th>{{ __('auth.user_role') }}</th>
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
                                                    'start' => ($users->currentpage()-1)*$users->perpage()+1,
                                                    'end' => $users->currentpage()*$users->perpage(),
                                                    'total' => $users->total(),
                                                    ]) }}
                            </div>
                        </div>
                        <div class="col-7 d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
