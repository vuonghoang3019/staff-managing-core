<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('admins/assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/style.css') }}">
</head>
<body>
<div class="wrapper fadeInDown" style="background: url({{ asset('home/images/banner.png') }})">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h2>ASIA SYSTEM ADMIN</h2>
        </div>

        <!-- Login Form -->
        <form action="{{ route('postLogin') }}" method="POST">
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
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Xác nhận">
        </form>

    <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="{{ route('get.form.reset') }}">Quên mật khẩu?</a>
        </div>

    </div>
</div>
</body>
<script src="{{ asset('admins/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/bootstrap.min.js') }}"></script>
</html>
