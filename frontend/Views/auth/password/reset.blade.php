@extends('master.master')
@section('title')
    <title>Quên mật khẩu</title>
@endsection
@section('css')
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
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-1">
                <?php $email = $_GET['email'];$code = $_GET['code'] ?>
                <form action="{{ route('password.updatePassword') }}" method="post">
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
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden"  name="code" value="{{ $code }}">
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
@endsection
@section('js')
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

