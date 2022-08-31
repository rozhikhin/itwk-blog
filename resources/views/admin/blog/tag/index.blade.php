@extends('layouts.admin')
@section('title', __('blog.tags') )
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <a href="{{ route('admin.blog.tag.create') }}" class="btn btn-success">{{ __('blog.tag_new') }}</a>
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
                                    <th>{{ __('blog.title') }}</th>
                                    <th colspan="3">{{ __('blog.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td style="width: 100px;">
                                            <div class="d-flex align-items-center justify-content-between mr-1 ml-1">
                                                <a href="{{ route('admin.blog.tag.show', $tag->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.blog.tag.edit', $tag->id) }}"
                                                   class="mr-1 text-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.blog.tag.destroy', $tag->id) }}"
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
                                    <th>{{ __('blog.title') }}</th>
                                    <th colspan="3">{{ __('blog.actions') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                {{ __('blog.paginate_info', [
                                                    'start' => ($tags->currentpage()-1) * $tags->perpage()+1,
                                                    'end' => $tags->currentpage() * $tags->perpage(),
                                                    'total' => $tags->total(),
                                                    ]) }}
                            </div>
                        </div>
                        <div class="col-7 d-flex justify-content-end">
                            {{ $tags->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
