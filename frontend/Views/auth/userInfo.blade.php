@extends('frontend::master.master')
@section('title')
    <title>Thông tin tài khoản</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('home/css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/tab.css') }}">
    <style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {
            position: absolute;
            top: 50%;
            right: 10px;
            z-index: 1;
            color: #f36c01;
            margin-top: -10px;
            cursor: pointer;
            transition: .3s ease all;
        }

        .pass_show .ptxt:hover {
            color: #333333;
        }
    </style>
@endsection
@section('content')

    <div class="container mt-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#userinfo"> <i class="fas fa-info"></i> Thông tin cá
                    nhân</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#payment"> <i class="fas fa-history"></i>Lịch sử giao
                    dịch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#password"> <i class="fas fa-lock"></i>Mật khẩu</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="userinfo" class="container tab-pane active"><br>
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
                                            {{--                                        <input type="file" id="file" name="image_path" style="display:none;"/>--}}
                                            {{--                                        <a href="#" class="btn btn-info btn-sm remove" id="button" name="button"--}}
                                            {{--                                           value="Upload" onclick="thisFileUpload();"> <span--}}
                                            {{--                                                class="glyphicon glyphicon-upload"></span> Upload File</a>--}}
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
                                            <input type="text" class="form-control " readonly
                                                   style=" background-color: #fff;"
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
                                            <input type="text" class="form-control" readonly
                                                   style=" background-color: #fff;"
                                                   value="{{ $studentDetail->phone }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Ngày sinh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="date" class="form-control" readonly
                                                   style=" background-color: #fff;"
                                                   value="{{ $studentDetail->birthday }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Dân tộc</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" readonly
                                                   style=" background-color: #fff;"
                                                   value="{{ $studentDetail->nation }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="payment" class="container tab-pane fade"><br>
                <table class="table">
                    <thead class="bg-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Khóa học</th>
                        <th scope="col">Số tiền</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Mã thanh toán</th>
                        <th scope="col">Ngân hàng</th>
                        <th scope="col">Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0; ?>
                    @foreach($paymentDetail as $payment)
                        <tr>
                            <th scope="row">{{ $stt }}</th>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->course->name }}</td>
                            <td>{{ number_format( $payment->total)  }} VNĐ</td>
                            <td>{{ $payment->note }}</td>
                            <td>{{ $payment->code_vnpay }}</td>
                            <td>{{ $payment->code_bank }}</td>
                            <td>{{ $payment->time }}</td>
                        </tr>
                        <?php $stt++ ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="password" class="container tab-pane fade"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-md-offset-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('user.update.password',['id' => $studentDetail->id]) }}" method="post">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <label>Mật khẩu hiện tại</label>
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control @error('password_old') is-invalid @enderror"
                                               name="password_old">
                                        @error('password_old')
                                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label>Mật khẩu mới</label>
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               name="password">
                                        @error('password')
                                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label>Xác nhận Mật khẩu</label>
                                    <div class="form-group pass_show">
                                        <input type="password" class="form-control @error('password_confirm') is-invalid @enderror"
                                               name="password_confirm">
                                        @error('password_confirm')
                                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Xác nhận</button>
                                </form>
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
    <script>
        $(document).ready(function () {
            $('.pass_show').append('<span class="ptxt">Hiện</span>');
        });


        $(document).on('click', '.pass_show .ptxt', function () {

            $(this).text($(this).text() == "Hiện" ? "Ẩn" : "Hiện");

            $(this).prev().attr('type', function (index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });

        });
    </script>
@endsection
