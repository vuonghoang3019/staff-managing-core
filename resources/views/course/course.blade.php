@extends('master.master')
@section('title')
    <title>Khóa học</title>
    @endsection
        </div>
@section('content')
    <div class="all-title-box title-image" style="background-image:url({{ asset('home/images/banner.png') }});background-repeat: no-repeat;background-attachment: fixed;background-position: center">
    </div>
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="text-danger">Khóa học tại trung tâm Ngoại ngữ Asia</h3>
            </div><!-- end title -->
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
