<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('admins/assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/style.css') }}">
    <style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {
            position: absolute;
            top: 50%;
            right: 10%;
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
</head>
<body>
<div class="wrapper fadeInDown" style="background: url({{ asset('home/images/banner.png') }})">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h2>Quên mật khẩu</h2>
        </div>

        <!-- Login Form -->
        <form action="{{ route('password.updatePassword.admin') }}" method="POST">
            @csrf
            <?php $email = $_GET['email'];$code = $_GET['code_reset'] ?>
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
            <div class="form-group pass_show">
                <input type="password" id="password_old" class="fadeIn third " name="password_old">
                @error('password_old')
                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group pass_show">
                <input type="hidden" id="email" class="fadeIn third" name="email" value="{{ $email }}">
                <input type="hidden" id="code" class="fadeIn third " name="code" value="{{ $code }}">
                <input type="password" id="password" class="fadeIn third " name="password">
                @error('password')
                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group pass_show">
                <input type="password" id="password_confirm" class="fadeIn third " name="password_confirm">
                @error('password_confirm')
                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="fadeIn fourth" value="Xác nhận">
        </form>

    </div>
</div>
</body>
<script src="{{ asset('admins/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/bootstrap.min.js') }}"></script>
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
</html>
