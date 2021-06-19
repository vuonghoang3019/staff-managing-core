@extends('master.master')
@section('title')
    <title>Thông tin tài khoản</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('home/css/user.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset($studentDetail->image_path) }}" alt="Admin"
                                     class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ $studentDetail->name }}</h4>
                                    <p class="text-secondary mb-1">Lớp: {{ $studentClassroom->name }}</p>
                                    <p class="text-muted font-size-sm">
                                        @foreach($courses as $course)
                                            @if($studentClassroom->course_id == $course->id)
                                                Khóa học:  {{ $course->name }}
                                            @endif
                                        @endforeach
                                    </p>
                                    {{--                                    <input type="file" id="file" name="image_path" style="display:none;"/>--}}
                                    {{--                                    <a href="#" class="btn btn-info btn-sm remove" id="button" name="button"--}}
                                    {{--                                       value="Upload" onclick="thisFileUpload();"> <span--}}
                                    {{--                                            class="glyphicon glyphicon-upload"></span> Upload File</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Họ tên</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control " readonly style=" background-color: #fff;"
                                           value="{{ $studentDetail->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" readonly
                                           style=" background-color: #fff;" value="{{ $studentDetail->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" readonly style=" background-color: #fff;"
                                           value="{{ $studentDetail->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày sinh</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" class="form-control" readonly style=" background-color: #fff;"
                                           value="{{ $studentDetail->birthday }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dân tộc</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" readonly style=" background-color: #fff;"
                                           value="{{ $studentDetail->nation }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="submit" class="btn btn-primary px-4">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
@section('js')
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        };
    </script>
@endsection
