@extends('master.master')
@section('title')
    <title>Giáo viên</title>
@endsection
@section('content')

    <div class="all-title-box" style="background: url({{ asset('home/images/banner.png') }})">
    </div>

    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                            <div class="team-img">
                                <img src="{{ asset($user->image_path) }}" width="255" height="325" class="border">
{{--                                <div class="social">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#" class="fa fa-facebook"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-twitter"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-linkedin"></a></li>--}}
{{--                                        <li><a href="#" class="fa fa-skype"></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{ $user->name }}</h3>
                                <span class="post"> Trình độ:
                                    @foreach($user->grades as $item)
                                        {{ $item->name  }},
                                    @endforeach

                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    @include('components.slideTeacher')

@endsection
