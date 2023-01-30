@extends('admin::master.master')
@section('title')
    <title>Schedule</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Lịch dạy', 'key' => 'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('schedule-add')
                        <div class="col-md-12">
                            <a href="{{ route('schedule.create') }}" class="btn btn-success">Thêm</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Giáo viên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Thứ</th>
                                <th scope="col">Phòng học</th>
                                <th scope="col">Giờ bắt đầu</th>
                                <th scope="col">Giờ kết thúc</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($schedules))
                                @foreach($schedules as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->class->name }}</td>
                                        <td>
                                            @foreach($weeks as $item => $day)
                                                {{ $data->weekday === $item ? $day : '' }}
                                            @endforeach
                                        </td>
                                        <td>{{ $data->room->name }}</td>
                                        <td>{{ substr($data->start_time, 0, -3) }}</td>
                                        <td>{{ substr($data->end_time, 0, -3) }}</td>
                                        <td>
                                            @can('schedule-update')
                                                <a href="{{ route('schedule.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Sửa
                                                </a>
                                            @endcan
                                            @can('schedule-delete')
                                                <a href=""
                                                   data-url="{{ route('schedule.delete',['id' => $data->id]) }}"
                                                   class="btn btn-danger action-delete">Xóa
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
                        {{ $schedules->links('pagination::bootstrap-4') }}
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
