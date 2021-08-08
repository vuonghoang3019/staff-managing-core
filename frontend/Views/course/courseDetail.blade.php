@extends('master.master')
@section('title')
    <title>Course Detail</title>
@endsection
@section('content')
    <div class="all-title-box title-image" style="background-image:url({{ asset('home/images/banner.png') }});background-repeat: no-repeat;background-attachment: fixed;background-position: center">
    </div>
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="text-danger">{{ $courseDetail->name }}</h3>
            </div><!-- end title -->
            <div class="row">

                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="{{ asset($courseDetail->image_path) }}" alt="" width="750" height="450">
                        </div>
                        <div class="post-content">
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> {{ $courseDetail->created_at }} </span>
                            </div>
                            <div class="blog-desc">
                                <p>{{ $courseDetail->name }}</p>
                                <p>{!! $courseDetail->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                {{-- new--}}
                @include('components.news')
                {{-- End new--}}

            </div><!-- end row -->
            <hr class="hr3">
            <div id="plan" class="section wb" style="padding: 0">
                <div class="container">
                    <hr class="invis">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="row text-center">
                                    @foreach($prices as $price)
                                        <div class="col-md-3">
                                            <div class="pricing-table pricing-table-highlighted">
                                                <div class="pricing-table-header grd1">
                                                    <h2>{{ number_format($price->price)  }} VNĐ </h2>
                                                    @if($price->name == 'month')
                                                        <h3>/ 1 Tháng</h3>
                                                    @elseif($price->name == 'threeMonth')
                                                        <h3>/ 3 Tháng</h3>
                                                    @elseif($price->name == 'quarter')
                                                        <h3>/ Qúy</h3>
                                                    @elseif($price->name == 'year')
                                                        <h3>/ 1 Năm</h3>
                                                    @endif
                                                </div>
                                                <div class="pricing-table-space"></div>
                                                <div class="pricing-table-features">
                                                    @if($price->sale > 0)
                                                        <p><strong>-
                                                                Tặng</strong>{{ number_format(( $price->sale *$price->price) / 100 )  }}
                                                            VNĐ</p>
                                                    @endif
                                                    <p><strong>- {{ $price->lesson }}</strong>Buổi</p>
                                                    <p><strong><i class="fas fa-tshirt"></i></strong>150.000 VNĐ/1 chiếc
                                                    </p>
                                                    <p><strong><i class="fas fa-suitcase-rolling"></i></strong>150.000
                                                        VNĐ/1 chiếc</p>
                                                    <p><strong><i class="fas fa-book"></i></strong>660.000 VNĐ/ bộ sách
                                                        Discover,WW</p>
                                                </div>
                                                <div class="pricing-table-sign-up">
                                                    <a href="{{ route('course.showCart',['idPrice' => $price->id,'idCourse' => $courseDetail->id]) }}"
                                                       class="hover-btn-new"><span>Đặt ngay</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><!-- end row -->

                            </div><!-- end content -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
