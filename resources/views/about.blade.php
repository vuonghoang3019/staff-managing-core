@extends('master.master')
@section('title')
    <title>About</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('home/css/carousel.css') }}">
@endsection
@section('content')

    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>About Us<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
    <!-- about -->
    <div id="overviews" class="section lb">
        @include('components.about')
    </div><!-- End about -->

    <div class="hmv-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="fas fa-flag" style="position: relative;top: 15%;"></i></div>
                        <h3>Mission</h3>
                        <div class="tr-pa">M</div>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita,
                            provident cupiditate in excepturi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="fas fa-eye" style="position: relative;top: 15%;"></i></div>
                        <h3>Vision</h3>
                        <div class="tr-pa">V</div>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita,
                            provident cupiditate in excepturi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="fas fa-landmark" style="position: relative;top: 15%;"></i>
                        </div>
                        <h3>History</h3>
                        <div class="tr-pa">H</div>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don't look
                            even slightly believable.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita,
                            provident cupiditate in excepturi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonials" class="parallax section db parallax-off">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        @foreach($users as $user)
                        <div class="testimonial clearfix">
                            <div class="testi-meta">
                                <img src="{{ asset($user->image_path) }}" alt="" class="img-fluid">
                                <h4>{{ $user->name }}</h4>
                            </div>
                            <div class="desc">
                                <p class="lead">{{ $user->description }}</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        @endforeach


                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

@endsection
@section('js')

@endsection
