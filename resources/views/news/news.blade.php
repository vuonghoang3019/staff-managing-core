@extends('master.master')
@section('title')
    <title>Tuyển dụng</title>
@endsection
@section('content')

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row">
                @foreach($news as $newItem)

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <a href="{{ route('news.detail',['id' => $newItem->id]) }}"> <img
                                        src="{{ asset($newItem->image_path) }}" alt="" width="200" height="200"></a>

                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a
                                        href="#">{{ $newItem->created_at }}</a> </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="{{ route('news.detail',['id' => $newItem->id]) }}" title="">
                                        <p>{!! \Illuminate\Support\Str::limit($newItem->title,50) !!}</p></a></h2>
                            </div>
                            <div class="blog-desc" style="height: 100px">
                                <p> {!! \Illuminate\Support\Str::limit($newItem->content,100) !!}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange"
                                   href="{{ route('news.detail',['id' => $newItem->id]) }}"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->

            <hr class="hr3">


        </div><!-- end container -->
    </div><!-- end section -->




@endsection
