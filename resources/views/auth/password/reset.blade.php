@extends('master.master')
@section('title')
    <title>Quên mật khẩu</title>
@endsection
@section('css')
    <style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {

            position: absolute;

            top: 50%;

            right: 10px;

            z-index: 1;

            color: #f36c01;

            margin-top: -10px;

            cursor: pointer;

            transition: .3s ease all;

        }

        .pass_show .ptxt:hover {
            color: #333333;
        }
    </style>
@endsection
@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center" >
            <div class="col-md-8 col-md-offset-1">

                <form>
                    <div class="form-group pass_show">
                        <label>Nhập Password hiện tại</label>
                        <input type="password" value="" class="form-control" placeholder="Current Password">
                    </div>
                    <label>Nhập Password mới</label>
                    <div class="form-group pass_show">
                        <input type="password" value="" class="form-control" placeholder="New Password">
                    </div>
                    <label>Nhập lại password</label>
                    <div class="form-group pass_show">
                        <input type="password" value="" class="form-control" placeholder="Confirm Password">
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.pass_show').append('<span class="ptxt">Show</span>');
        });


        $(document).on('click', '.pass_show .ptxt', function () {

            $(this).text($(this).text() == "Show" ? "Hide" : "Show");

            $(this).prev().attr('type', function (index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });

        });
    </script>
@endsection

