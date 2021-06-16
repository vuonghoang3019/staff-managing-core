@extends('master.master')
@section('title')
    <title>About</title>
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('home/css/carousel.css') }}">--}}
@endsection
@section('content')

    <div class="all-title-box" style="background: url({{ asset('home/images/banner.png') }})">
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
                        <h3>Sứ mệnh</h3>
                        <div class="tr-pa">S</div>
                        <p>Thời đại internet và toàn cầu hóa đang góp phần xóa nhòa ranh giới về khoảng cách địa lý,
                            cơ hội tiếp cận tri thức nhân loại sẽ dành cho tất cả những ai có vốn ngoại ngữ và sử dụng thành thạo tin học.
                            New Sky là nơi học ngoại ngữ chất lượng và uy tín đảm bảo cho tất cả học viên.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="fas fa-eye" style="position: relative;top: 15%;"></i></div>
                        <h3>Tầm nhìn</h3>
                        <div class="tr-pa">T</div>
                        <p>Trong tương lai, trung tâm phấn đấu trở thành nơi đào tạo uy tín,
                            chất lượng nhất, mang cơ hội học ngoại ngữ và tiếp
                            cận tri thức nhân loại cho tất cả mọi người.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="inner-hmv">
                        <div class="icon-box-hmv"><i class="fas fa-landmark" style="position: relative;top: 15%;"></i>
                        </div>
                        <h3>Giá trị cốt lõi</h3>
                        <div class="tr-pa">G</div>
                        <p>Luôn xem con người là giá trị cốt lõi, khuyến khích đội ngũ nhân viên, giáo viên tâm huyết với nghề dạy học, làm việc với tinh thần trách nhiệm cao nhất, phấn đấu hết mình vì chất lượng giảng dạy. Tất cả hướng đến một thế hệ thanh niên thông thạo ngoại ngữ, tiếp cận tri thức nhân loại, không phân biệt tầng lớp giàu nghèo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.slideTeacher')

@endsection
@section('js')

@endsection
