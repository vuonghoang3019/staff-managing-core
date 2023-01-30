@extends('backend::master.master')
@section('title')
    <title>Role</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'Role', 'key' => 'List Role'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('role-add')
                        <div class="col-md-12">
                            <a href="{{ route('role.create') }}" class="btn btn-success">Add</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($roles))
                                @foreach($roles as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($data->description,20)}}</td>
                                        <td>
                                            @can('role-update')
                                                <a href="{{ route('role.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Edit
                                                </a>
                                            @endcan
                                            @can('role-delete')
                                                <a href=""
                                                   data-url="{{ route('role.delete',['id' => $data->id]) }}"
                                                   class="btn btn-danger action-delete">Delete
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
                        {{ $roles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/assets/delete.js') }}"></script>
@endsection
