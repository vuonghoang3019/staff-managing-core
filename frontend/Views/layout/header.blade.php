{{--<div id="preloader">--}}
{{--    <div class="loader-container">--}}
{{--        <div class="progress-br float shadow">--}}
{{--            <div class="progress__item"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- END LOADER -->
<!-- Start header -->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="fas fa-headset"></i>+84 0962 190 498</li>
                        <li><a href="{{ route('change.language',['en']) }}"><i class="fas fa-flag-usa"></i>EN</a></li>
                        <li><a href="{{ route('change.language',['vi']) }}"><i class="fas fa-headset"></i>VI</a></li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content" style="float: right">
                    <ul class="list-main">
                        @if(Auth::guard('student')->check())
                            <li>Xin chào</li>
                            <li>
                                <i class="fas fa-user"></i>
                                <a href="{{ route('user.info',['id' => auth()->guard('student')->user()->id ]) }}">
                                    {{  auth()->guard('student')->user()->name }}
                                </a>
                            </li>
                            <li><i class="fas fa-power-off"></i><a href="{{ route('logoutUser') }}">Đăng xuất</a></li>
                        @else
                            <li><i class="fas fa-power-off"></i><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><i class="fas fa-power-off"></i><a href="{{ route('register') }}">Đăng ký</a></li>
                        @endif
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('home/images/logoAsia.png') }}" style="width: 60px; height: 60px"
                     class="rounded-circle"/>
            </a>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('course') }}">Khóa học </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($data['courses'] as $course)
                                <a class="dropdown-item"
                                   href="{{ route('course.detail',['id' => $course-> id]) }}">{{ $course->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('teacher') }}">Giáo Viên</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($data['teachers'] as $teacher)
                                <a class="dropdown-item"
                                   href="{{ route('get.type.teacher',['is_check' => $teacher->is_check]) }}">{{ $teacher->is_check == 1 ? 'Giáo viên nước ngoài' : 'Giáo viên bản địa'  }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('recruitment') }}">Tuyển dụng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">Tin tức</a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
