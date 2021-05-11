@extends('admin::layouts.master')
@section('title')
    <title>Admin</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => '', 'key' => 'Dashboard'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Calendar
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Time</th>
                                    @foreach($weekDays as $day)
                                        <th>{{ $day }}</th>
                                    @endforeach
                                    </thead>
                                    <tbody>
                                    @foreach($calendars as $time => $calendar)
                                        <tr>
                                            <td>
                                                {{ $time }}
                                            </td>
                                            @foreach($calendar as $value)
                                                @if(is_array($value))
                                                    <td rowspan="{{ $value['rowspan'] }}"
                                                        class="align-middle text-center"
                                                        style="background-color:#f0f0f0">
                                                        {{ $value['className'] }} <br>
                                                        Teacher
                                                        {{ $value['teacherName'] }}
                                                    </td>
                                                @elseif($value == 1)
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
        </section>


    </div>

@endsection
