@extends('backend::master.master')
@section('title')
    <title>Admin</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/index.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => '', 'key' => 'Dashboard'])
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Lịch giảng dạy
                        </div>
                        {{--                        <div class="card-body">--}}
                        {{--                                                        <table class="table table-bordered">--}}
                        {{--                                                            <thead>--}}
                        {{--                                                            <th width="125">Time</th>--}}
                        {{--                                                            @foreach($weekDays as $day)--}}
                        {{--                                                                <th>{{ $day }}</th>--}}
                        {{--                                                            @endforeach--}}
                        {{--                                                            </thead>--}}
                        {{--                                                            <tbody>--}}
                        {{--                                                            @foreach($calendarData as $time => $days)--}}
                        {{--                                                                <tr>--}}
                        {{--                                                                    <td>--}}
                        {{--                                                                        {{ $time }}--}}
                        {{--                                                                    </td>--}}
                        {{--                                                                    @foreach($days as $value)--}}
                        {{--                                                                        @if (is_array($value))--}}
                        {{--                                                                            <td rowspan="4" class="align-middle text-center" width="200"--}}
                        {{--                                                                                height="200"--}}
                        {{--                                                                                style="background-color:#f0f0f0">--}}
                        {{--                                                                                {{ $value['class_name'] }}<br>--}}
                        {{--                                                                                Teacher: {{ $value['teacher_name'] }}--}}
                        {{--                                                                                Phòng: {{ $value['room_name'] }}--}}
                        {{--                                                                            </td>--}}
                        {{--                                                                        @elseif ($value === 1)--}}
                        {{--                                                                            <td></td>--}}
                        {{--                                                                        @endif--}}
                        {{--                                                                    @endforeach--}}
                        {{--                                                                </tr>--}}
                        {{--                                                            @endforeach--}}
                        {{--                                                            </tbody>--}}
                        {{--                                                        </table>--}}
                        {{--                        </div>--}}
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" style="width: 2000px">
{{--                                <thead>--}}
{{--                                <tr class="bg-light-gray">--}}
{{--                                    <th class="text-uppercase">Time--}}
{{--                                    </th>--}}
{{--                                    <th class="text-uppercase">Monday</th>--}}
{{--                                    <th class="text-uppercase">Tuesday</th>--}}
{{--                                    <th class="text-uppercase">Wednesday</th>--}}
{{--                                    <th class="text-uppercase">Thursday</th>--}}
{{--                                    <th class="text-uppercase">Friday</th>--}}
{{--                                    <th class="text-uppercase">Saturday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
                                <tbody>
                                @foreach($weekDays as $key => $day)
                                    <tr>
                                        <td class="align-middle">{{ $day }}</td>
                                        @foreach($schedules as $schedule)
                                            @if($schedule->weekday == $key)
                                                <td>
                                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                                    {{ $schedule->class->name }}
                                                </span>
                                                    <div class="margin-10px-top font-size18">{{ substr($schedule->start_time,0,-3).'-'.substr($schedule->end_time,0,-3)}}</div>
                                                    <div class="font-size15 text-gray">{{ $schedule->user->name }}</div>
                                                    <div class="font-size15 text-gray">{{ $schedule->room->name }}</div>
                                                    <div class="font-size15 text-gray">{{ $day }}</div>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
