<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('home\css\login.css') }}" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Đăng nhập</h2>
                <form action="{{ route('postLogin.User') }}" method="post" class="login-form">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="text-uppercase">Email</label>
                        <input type="text" class="form-control" placeholder="" name="email">

                    </div>
                    <div class="form-group">
                        <label for="password" class="text-uppercase">Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <small>Remember Me</small>
                        </label>
                        <button type="submit" class="btn btn-login float-right">Đăng nhập</button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <div class="form-group">
                        Bạn chưa có tài khoản <a href="{{ route('register') }}">Đăng ký ngay</a>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('get.reset.password') }}">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ asset('home/images/banner.png') }}" alt="" width="760" height="500">
                        </div>

                    </div>

                </div>
            </div>
        </div>
</section>
</body>
</html>
