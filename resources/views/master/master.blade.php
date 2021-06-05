<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Site Metas -->
@yield('title')
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('home/css/versions.css') }}">
<link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('home/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('home/fontawesome-free/css/all.css') }}">
@yield('css')
</head>
<body class="host_version">
<!-- LOADER -->
@include('layout.header')

@yield('content')

@include('layout.footer')
</body>
<script src="{{ asset('home/js/modernizer.js') }}"></script>
<script src="{{ asset('home/js/all.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
<script src="{{ asset('home/js/timeline.min.js') }}"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
@yield('js')
</html>
