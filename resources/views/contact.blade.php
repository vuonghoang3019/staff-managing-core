@extends('master.master')
@section('title')
    <title>Home</title>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script>
        // $(document).ready(function () {
        //
        // })
        $('.accept').on('click', function (event) {
            event.preventDefault();
            let name_parent = $('.name_parent').val();
            let phone = $('.phone').val();
            let name_student = $('.name_student').val();
            let email = $('.email').val();
            let url = "{{ route('contact.store') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}',
                    name_parent,
                    phone,
                    name_student,
                    email
                },
                success: function (data) {
                    if (data.code === 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Thông tin của bạn đã được gửi',
                            showConfirmButton: true,
                        })
                    }
                }
            });
        })

    </script>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
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
                            <li><strong style="font-size: 15px; ">Hotline:</strong> 0328741074</li>
                            <li><strong style="font-size: 15px; ">Hotline:</strong> vuongmau199@gmail.com</li>
                            <li><strong style="font-size: 15px; ">Địa chỉ:</strong> Ô 41, lô sg1, đường, Cái Dăm, tổ 3
                                khu 7, Thành phố Hạ Long, Quảng Ninh
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">

                    <div class="form-group">
                        <input type="text" name="name_parent" class="form-control name_parent"
                               placeholder="Họ và tên phụ huynh" value="{{ old('name_parent') }}">
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" class="form-control phone" placeholder="01234568"
                               value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name_student" class="form-control name_student"
                               placeholder="Họ và tên học sinh" value="{{ old('name_student') }}">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control email" placeholder="google@gmail.com"
                               value="{{ old('email') }}">
                    </div>
                    <button type="submit" class="btn btn-primary accept">ĐĂNG KÝ</button>

                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -
@endsection

