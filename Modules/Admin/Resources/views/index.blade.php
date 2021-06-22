@extends('admin::layouts.master')
@section('title')
    <title>Admin</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => '', 'key' => 'Dashboard'])
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Calendar
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <th width="125">Time</th>
                                @foreach($weekDays as $day)
                                    <th>{{ $day }}</th>
                                @endforeach
                                </thead>
                                <tbody>
                                @foreach($calendarData as $time => $days)
                                    <tr>
                                        <td>
                                            {{ $time }}
                                        </td>
                                        @foreach($days as $value)
                                            @if (is_array($value))
                                                <td rowspan="4" class="align-middle text-center" width="200"
                                                    height="200"
                                                    style="background-color:#f0f0f0">
                                                    {{ $value['class_name'] }}<br>
                                                    Teacher: {{ $value['teacher_name'] }}
                                                    Phòng: {{ $value['room_name'] }}
                                                </td>
                                            @elseif ($value === 1)
                                                <td></td>
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
