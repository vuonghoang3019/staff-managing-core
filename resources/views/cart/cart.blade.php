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
    <div class="container">
        <!--Section: Block Content-->
        <section class="mb-5 mt-4">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active"><img src="{{ asset($courseDetail->image_path) }}" class="rounded border"
                                                          style="width: 510px; height: 320px"/></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $courseDetail->name }}</h3>
                    <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia
                        sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                    <h4 class="price">current price: <span>$180</span></h4>
                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>
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
                        </div>
                    </div>

                </div>


            </div>

        </section>
        <!--Section: Block Content-->
    </div>
@endsection
