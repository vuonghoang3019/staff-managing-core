@extends('admin::layouts.master')
@section('title')
    <title>Schedule</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Schedule', 'key' => 'List schedule'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('schedule.create') }}" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Giáo viên</th>
                                <th scope="col">Lớp</th>
{{--                                <th scope="col">Khóa học</th>--}}
                                <th scope="col">Ngày</th>
                                <th scope="col">Giờ học</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($schedules))
                                @foreach($schedules as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->teacher->name }}</td>
                                        <td>{{ $data->class->name }}</td>
{{--                                        <td>{{ $data->course->name }}</td>--}}
                                        <td>{{ $data->calendar->day }}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    Bắt đầu :
                                                    {{ $data->calendar->start_time }}
                                                </li>
                                                <li>
                                                    Kết thúc :
                                                    {{ $data->calendar->end_time }}
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{ $data->date_start }}</td>
                                        <td>{{ $data->date_end }}</td>
                                        <td>
                                            <a href="{{ route('schedule.edit',['id' => $data->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('schedule.delete',['id' => $data->id]) }}"
                                               class="btn btn-danger action-delete">Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
{{--                        {{ $schedule->links('pagination::bootstrap-4') }}--}}
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
