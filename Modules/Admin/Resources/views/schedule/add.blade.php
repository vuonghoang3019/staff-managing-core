@extends('admin::layouts.master')
@section('title')
    <title>Add Schedule</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Schedule  ', 'key' => 'Add Schedule'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('schedule.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="classroom_id">Lớp</label>
                                <select class="form-control " name="classroom_id">
                                    <option value="">---Chọn lớp---</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Giáo Viên</label>
                                <select class="form-control " name="teacher_id">
                                    <option value="">---Chọn giáo viên---</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="course_id">Khóa học</label>
                                <select class="form-control " name="course_id">
                                    <option value="">---Chọn khóa học---</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="day">Nhập thứ</label>
                                <input type="text" class="form-control @error('day') is-invalid @enderror" id="day"
                                       placeholder="Monday-Sunday" name="day" value="{{ old('day') }}">
                                @error('day')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="startTime">Start Time</label>
                                <input type="time" class="form-control @error('startTime') is-invalid @enderror"
                                       id="startTime"
                                       name="start_time" value="{{ old('startTime') }}">
                                @error('startTime')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="endTime">End Time</label>
                                <input type="time" class="form-control  @error('endTime') is-invalid @enderror"
                                       id="endTime"
                                       name="end_time" value="{{ old('endTime') }}">
                                @error('endTime')
                                <div class=time>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
