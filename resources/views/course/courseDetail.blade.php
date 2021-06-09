@extends('master.master')
@section('title')
    <title>About</title>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>Blog<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
    <div id="overviews" class="section wb">
        <div class="container">
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
                                <p>{!! $courseDetail->description !!}</p>
                            </div>
                        </div>
                    </div>


                </div><!-- end col -->

                <div class="col-lg-3 col-12 right-single">
                    <div class="widget-search">
                        <div class="site-search-area">
                            <form method="get" id="site-searchform" action="#">
                                <div>
                                    <input class="input-text form-control" name="search-k" id="search-k"
                                           placeholder="Search keywords..." type="text">
                                    <input id="searchsubmit" value="Search" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget-categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li><a href="#">Political Science</a></li>
                            <li><a href="#">Business Leaders Guide</a></li>
                            <li><a href="#">Become a Product Manage</a></li>
                            <li><a href="#">Language Education</a></li>
                            <li><a href="#">Micro Biology</a></li>
                            <li><a href="#">Social Media Management</a></li>
                        </ul>
                    </div>
                    <div class="widget-tags">
                        <h3 class="widget-title">Search Tags</h3>
                        <ul class="tags">
                            <li><a href="#"><b>business</b></a></li>
                            <li><a href="#"><b>jquery</b></a></li>
                            <li><a href="#">corporate</a></li>
                            <li><a href="#">portfolio</a></li>
                            <li><a href="#">css3</a></li>
                            <li><a href="#"><b>theme</b></a></li>
                            <li><a href="#"><b>html5</b></a></li>
                            <li><a href="#"><b>mysql</b></a></li>
                            <li><a href="#">multipurpose</a></li>
                            <li><a href="#">responsive</a></li>
                            <li><a href="#">premium</a></li>
                            <li><a href="#">javascript</a></li>
                            <li><a href="#"><b>Best jQuery</b></a></li>
                        </ul>
                    </div>
                </div>
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
                                                    <a href="{{ route('course.showCart',['idPrice' => $price->id,'idCourse' => $courseDetail->id]) }}" class="hover-btn-new"><span>Đặt ngay</span></a>
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
