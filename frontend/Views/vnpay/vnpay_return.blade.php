@extends('frontend::master.master')
@section('title')
    <title>Tạo mới đơn hàng</title>
@endsection
@section('css')
    <link href="{{ asset('vnpay/assets/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('vnpay/assets/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('vnpay/assets/jquery-1.11.3.min.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Thông tin chuyển khoản</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label>{{ $vnpayData['vnp_TxnRef'] }}</label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label> {{ $vnpayData['vnp_Amount'] }} VNĐ</label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label>{{ $vnpayData['vnp_OrderInfo'] }}</label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label>{{ $vnpayData['vnp_ResponseCode'] }}</label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label>{{ $vnpayData['vnp_TransactionNo'] }}</label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label>{{ $vnpayData['vnp_BankCode']  }}</label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label>{{ date('Y-m H:i',strtotime($vnpayData['vnp_PayDate']))   }}</label>
            </div>
            <div class="form-group">
                <label>Kết quả: GD thành công</label>
                <label>

                </label>
                <br>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Quay lại
                </a>
            </div>
        </div>
    </div>
@endsection
