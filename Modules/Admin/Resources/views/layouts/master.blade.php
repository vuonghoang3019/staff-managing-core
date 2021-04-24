<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admins/assets/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/summernote-bs4.min.css') }}">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    @include('admin::components.header')

    @include('admin::components.sidebar')

    @yield('content')

    @include('admin::components.footer')

</body>
<script src="{{ asset('admins/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/bootstrap.bundle.min.js')  }}"></script>
<script src="{{ asset('admins/assets/js/sparkline.js') }}"></script>
<script src="{{ asset('admins/assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/adminlte.js') }}"></script>
<script src="{{ asset('admins/assets/js/demo.js') }}"></script>
@yield('js')
</html>


