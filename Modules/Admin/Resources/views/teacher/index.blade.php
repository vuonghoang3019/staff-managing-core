@extends('admin::layouts.master')
@section('title')
    <title>Teachers</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'User', 'key' => 'List User'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('teacher-add')
                        <div class="col-md-12">
                            <a href="{{ route('teacher.create') }}" class="btn btn-success">ADD</a>
                            <a href="{{ route('teacher.export') }}" class="btn btn-success">Export</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mã NV</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Trình độ</th>
                                <th scope="col">Nổi bật</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($teachers))
                                @foreach($teachers as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td><img src="{{ asset($data->image_path)  }}" width="100" height="100"></td>
                                        <td>
                                            <ul>
                                                @foreach($data->roles as  $roleItem)
                                                    <li> {{  $roleItem->name  }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach($data->grades as  $gradeItem)
                                                    <li> {{  $gradeItem->name  }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            @if($data->is_check == 1)
                                                <i class="fas fa-check-circle" style="color: green"></i>
                                            @else
                                                <i class="fas fa-times-circle" style="color: red"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @can('teacher-update')
                                                <a href="{{ route('teacher.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('teacher-delete')
                                                <a href=""
                                                   data-url="{{ route('teacher.delete',['id' => $data->id]) }}"
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
                        {{ $teachers->links('pagination::bootstrap-4') }}
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
