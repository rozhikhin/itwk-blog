@extends('layouts.admin')
@section('title', __('auth.user_show', ['name' => $user->name]) )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header d-flex">
                <a href="{{ route('admin.user.edit', $user->id)}}" class="btn btn-success">{{ __('auth.edit') }}</a>
                <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#confirm-delete">{{ __('auth.destroy') }}</button>
                </form>
            </div>

            <div class="card-body">
                <div class="dataTables_wrapper"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">

                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('auth.user_name') }}</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('auth.user_email') }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('auth.user_role') }}</td>
                                        <td>{{ $user->role->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
