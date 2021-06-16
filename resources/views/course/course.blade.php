@extends('master.master')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/banner.png') }})">
        <div class="container text-center">
            <h1>Course Grid 2<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
    <div id="overviews" class="section wb">
        <div class="container">
            <hr class="invis">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="course-item mt-3">
                            <div class="course-list">
                                <a href="{{ route('course.detail',['id' => $course->id]) }}"><img
                                        src="{{ asset($course->image_path) }}" alt=""></a>
                            </div>
                            <div class="course-br">
                                <div class="course-title">
                                    <h2><a href="{{ route('course.detail',['id' => $course->id]) }}"
                                           title="">{{ $course->name }}</a></h2>
                                </div>
                                <div class="course-desc">
                                    <p>
                                        {!!  \Illuminate\Support\Str::limit($course->description,150) !!}
                                    </p>
                                </div>
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
