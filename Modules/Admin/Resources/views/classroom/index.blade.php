@extends('admin::layouts.master')
@section('title')
    <title>Classroom</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Lớp học', 'key' => 'Danh sách lớp học'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('classroom-add')
                        <div class="col-md-12">
                            <a href="{{ route('classroom.create') }}" class="btn btn-success">ADD</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Khóa học</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($classrooms))
                                @foreach($classrooms as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->course->name }}</td>
                                        <td>
                                            <a href="{{ route('classroom.action',['id' => $data->id]) }}"
                                               class=" {{ $data->getStatus($data->status)['class'] }}">
                                                {{ $data->getStatus($data->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            @can('classroom-update')
                                                <a href="{{ route('classroom.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('classroom-delete')
                                                <a href=""
                                                   data-url="{{ route('classroom.delete',['id' => $data->id]) }}"
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
                        {{ $classrooms->links('pagination::bootstrap-4') }}
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
