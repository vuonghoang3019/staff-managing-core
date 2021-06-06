{{--<div id="preloader">--}}
{{--    <div class="loader-container">--}}
{{--        <div class="progress-br float shadow">--}}
{{--            <div class="progress__item"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- END LOADER -->
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="" alt=""/>
            </a>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('course') }}" >Khóa học </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($courses as $course)
                                <a class="dropdown-item" href="{{ route('course.detail',['id' => $course-> id]) }}">{{ $course->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('teacher') }}">Giáo Viên</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('recruitment') }}">Tuyển dụng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
            </div>
{{--            @include('components.mainMenu')--}}

        </div>
    </nav>
</header>
<!-- End header -->
