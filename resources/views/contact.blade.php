@extends('master.master')
@section('title')
    <title>Home</title>
@endsection
@section('content')

    <div class="all-title-box" style="background: url({{ asset('home/images/banner.png') }})">
        <div class="container text-center">
            <h1>Contact<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="text-danger">THÔNG TIN LIÊN HỆ</h3>
                <p class="lead">Quý phụ huynh, học sinh vui lòng liên hệ với chúng tôi theo thông tin bên dưới, hoặc để
                    lại thông tin liên hệ vào biểu mẫu đăng ký. ASIA sẽ liên hệ trong thời gian sớm nhất.</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <ul>
                            <li><strong style="font-size: 15px; ">Hotline:</strong> +84 0962 190 498</li>
                            <li><strong style="font-size: 15px; ">Email:</strong> asiaedu@gmail.com</li>
                            <li><strong style="font-size: 15px; ">Địa chỉ:</strong> Ô 41, lô sg1, đường, Cái Dăm, tổ 3
                                khu 7, Thành phố Hạ Long, Quảng Ninh
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post" id="form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name_parent"
                                   class="form-control name_parent @error('name_parent') is-invalid @enderror"
                                   placeholder="Họ và tên phụ huynh" value="{{ old('name_parent') }}">
                            @error('name_parent')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone"
                                   class="form-control phone @error('phone') is-invalid @enderror"
                                   placeholder="01234568"
                                   value="{{ old('phone') }}">
                            @error('phone')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_student"
                                   class="form-control name_student @error('name_student') is-invalid @enderror"
                                   placeholder="Họ và tên học sinh" value="{{ old('name_student') }}">
                            @error('name_student')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email"
                                   class="form-control email @error('email') is-invalid @enderror"
                                   placeholder="google@gmail.com"
                                   value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="Content" class="form-control content"
                                      rows="2">{{ old('Content') }}</textarea>

                        </div>
                        <button type="submit" class="btn btn-primary accept">Gửi</button>
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -
@endsection

