@extends('master.master')
@section('title')
    <title>Tuyển dụng</title>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>Blog<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">TIN TỨC TUYỂN DỤNG</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">
                @foreach($recruitments as $recruitment)

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <a href="{{ route('recruitment.detail',['id' => $recruitment->id]) }}"> <img
                                        src="{{ asset($recruitment->image_path) }}" alt="" class="img-fluid"></a>

                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ $recruitment->created_at }}</a> </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="{{ route('recruitment.detail',['id' => $recruitment->id]) }}" title="">
                                        <p>{!! $recruitment->title !!}</p></a></h2>
                            </div>
                            <div class="blog-desc">
                                <p> {!! \Illuminate\Support\Str::limit($recruitment->content,130) !!}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange"
                                   href="{{ route('recruitment.detail',['id' => $recruitment->id]) }}"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->

            <hr class="hr3">


        </div><!-- end container -->
    </div><!-- end section -->




@endsection
