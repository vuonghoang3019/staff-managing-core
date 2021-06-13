@extends('master.master')
@section('title')
    <title>About</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('home\css\cart.css') }}">
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>Blog<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
    @if(session('error'))
        <div class="alert alert-danger" role="alert" style="position: fixed;right: 2%;bottom: 15%">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <!--Section: Block Content-->
        <section class="mb-5 mt-4">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active"><img src="{{ asset($courseDetail->image_path) }}"
                                                          class="rounded border"
                                                          style="width: 510px; height: 320px"/></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $courseDetail->name }}</h3>
                    <p class="product-description">Số buổi:<strong> {{ $prices->lesson }}</strong> /
                        @if($prices->name == 'month')
                            1 Tháng
                        @elseif($prices->name == 'threeMonth')
                            3 Tháng
                        @elseif($prices->name == 'quarter')
                            Qúy
                        @elseif($prices->name == 'year')
                            1 Năm
                        @endif
                    </p>
                    @if($prices->sale > 0)
                        <p class="product-description">Khuyến mãi: <strong>{{ $prices->sale }}%</strong>
                            Tiết kiệm: <strong> {{ number_format(($prices->sale * $prices->price) / 100) }}</strong> VNĐ</p>
                        <h4 class="price">Giá<span style="font-size: 1rem;text-decoration: line-through;color: #929292;margin-right: 10px;"> :{{ number_format($prices->price) }} VNĐ</span>
                            <span style="color: #d0011b;font-size: 1.875rem;"> {{ number_format( $prices->price - (($prices->sale * $prices->price) / 100)) }} VNĐ</span>
                        </h4>
                    @else
                        <h4 class="price">Giá<span> :{{ number_format($prices->price) }} VNĐ</span>

                        </h4>
                    @endif
                    <div class="action">
                        <a href="{{ route('payment.index',['idPrice' => $prices->id,'idCourse' => $courseDetail->id]) }}" class="add-to-cart btn btn-default">Thanh toán</a>
                    </div>
                </div>
            </div>


            <div class="col-md-12 mt-4">
                <nav>
                    <div class="nav nav-tabs nav-fill col-md-4" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">Khóa học</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0 pl-2 description-course" id="nav-tabContent">
                    <div class="tab-pane fade show active " id="nav-home" role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <div class="ml-5">
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <strong> 380.000</strong>
                                    VNĐ/ bộ sách Phonic,Fam, Skill (Mua tự nguyện nếu học sinh mât sách/ Đổi sách/ chuyển sách mới/ học)
                                </span>
                            </p>
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <strong> 560.000</strong>
                                    VNĐ/ 6 tháng / sách Fam, Phonic, Skill (Tiền sách màu + photo tài liệu bổ trợ + tặng cặp sách và áo đồng phục,có vở ghi, học sinh mất sách tự chịu tiền mua)
                                </span>
                            </p>
                            <p>
                                <span>
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <i class="fas fa-tshirt "></i> Áo
                                </span>
                                <strong>150.000</strong> VNĐ/1 chiếc (Mua tự nguyện)
                            </p>
                            <p>
                                <span>
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <i class="fas fa-suitcase-rolling mr-1"></i>
                                </span>Ba lô
                                <strong>150.000</strong> VNĐ/1 chiếc (Mua tự nguyện)
                            </p>
                            <p>
                                <span>
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <i class="fas fa-book mr-1"></i>
                                </span>Sách
                                <strong>660.000 </strong> VNĐ/ bộ sách Discover,WW
                            </p>
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <strong>Miễn phí</strong> Phí làm đề thi thử của Hội đồng Anh: đề Start (A0), Movers (A1), Flyers, KET (A2), PET (B1), FCE (B2) + Phí thi thử ielts
                                </span>
                            </p>
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <strong>Đăng ký tự nguyện</strong> Phí đi dã ngoại, tham gia sự kiện do trung tâm tổ chức
                                </span>
                            </p>
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    <strong>360.000 - 500.000</strong> / ca giáo viên Việt, <strong>1.200.000 - 1.800.000</strong> / ca giáo viên NN/ GV bản địa
                                </span>
                            </p>
                            <p>
                                <span class="mr-1">
                                    <i class="fas fa-check" style="color: #73726c"></i>
                                    {{ $prices->description }}
                                </span>
                            </p>
                        </div>
                    </div>

                </div>


            </div>

        </section>
        <!--Section: Block Content-->
    </div>
@endsection
@section('js')
{{--    <script>--}}
{{--        $('.add-to-cart').on('click', function () {--}}
{{--            let url = "{{ route('course.addToCart',['idPrice' => $prices->id,'idCourse' => $courseDetail->id]) }}";--}}
{{--            $.ajax({--}}
{{--                type: "GET",--}}
{{--                url: url,--}}
{{--                dataType: 'json',--}}
{{--                success: function (data) {--}}

{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
@endsection
