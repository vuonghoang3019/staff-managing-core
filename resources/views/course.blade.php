@extends('master.master')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>Course Grid 2<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                        lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="course-item">
                            <div class="image-blog">
                                <a href="{{ route('course.detail',['id' => $course->id]) }}"><img src="{{ asset($course->image_path) }}" alt="" width="500" height="400"></a>

                            </div>
                            <div class="course-br">
                                <div class="course-title">
                                    <h2><a href="#" title="">{{ $course->name }}</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($course->description,50) }}
                                    </p>
                                </div>
                            </div>
                            <div class="course-meta-bot">
                                <ul>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> 6 Month</li>
                                    <li><i class="fa fa-users" aria-hidden="true"></i> 56 Student</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->

            <hr class="hr3">
            <div class="col-md-12 float-right">
                {{ $courses->links('pagination::bootstrap-4') }}
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
