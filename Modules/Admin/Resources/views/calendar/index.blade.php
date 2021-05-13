@extends('admin::layouts.master')
@section('title')
    <title>Calendar</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Schedule', 'key' => 'List schedule'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('calendar.create') }}" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thứ</th>
                                <th scope="col">Giờ bắt đầu</th>
                                <th scope="col">Giờ kết thúc</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($calendars))
                                @foreach($calendars as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        @foreach($weeks as $item => $day)
                                            @if($item === $data->day)
                                                <td>{{ $day }}</td>
                                            @endif
                                        @endforeach

                                        <td>{{ $data->start_time }}</td>
                                        <td>{{ $data->end_time }}</td>
                                        <td><a href="">Status</a></td>
                                        <td>
                                            <a href="{{ route('calendar.edit',['id' => $data->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('calendar.delete',['id' => $data->id]) }}"
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
                                                {{ $calendars->links('pagination::bootstrap-4') }}
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
