@extends('master.master')
@section('title')
    <title>Quên mật khẩu</title>
@endsection
@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="forgot">
                    <h2>Forgot your password?</h2>
                    <p>Change your password in three easy steps. This will help you to secure your password!</p>
                    <ol class="list-unstyled">
                        <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                        <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link
                        </li>
                        <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
                    </ol>
                </div>
                <form class="card mt-4" action="{{ route('send.code.reset') }}" method="post">
                    @csrf
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email-for-pass" class="col-md-4 col-form-label text-md-right">
                                Nhập địa chỉ email của bạn
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" type="email" id="email-for-pass" name="email">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Lấy lại mật khẩu</button>
                        <a href="{{ route('login') }}" class="btn btn-danger">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

