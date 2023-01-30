@extends('admin::master.master')
@section('title')
    <title>Thanh toán</title>
@endsection
@section('css')
    <style>
        .custom-search-form {
            margin-top: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Danh sách thanh toán', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 form-inline mt-2 mb-2">
                        <div class="form-group col-md-6">
                            <label for="">Khóa học:</label>
                            <select class="form-control ml-2 classroom" name="classroom_id">
                                <option>---Chọn khóa học---</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Tên:</label>
                            <input type="text" class="form-control ml-2" id="search">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Học sinh</th>
                                <th scope="col">Khóa học</th>
                                <th scope="col">Số tiền</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Mã thanh toán</th>
                                <th scope="col">Ngân hàng</th>
                                <th scope="col">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($payments)  )
                                @foreach($payments as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td scope="row">{{ $data->user->name }}</td>
                                        <td scope="row">{{ $data->course->name }}</td>
                                        <td scope="row">{{ number_format($data->total) }} VNĐ</td>
                                        <td>{{ \Illuminate\Support\Str::limit($data->note,20) }}</td>
                                        <td scope="row">{{ $data->code_vnpay }}</td>
                                        <td scope="row">{{ $data->code_bank }}</td>
                                        <td scope="row">{{ $data->time }}</td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
                        {{ $payments->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.classroom').change(function () {
                let id = $(this).val();
                $.ajax({
                    url: '{{ route('payment.search.classroom') }}',
                    type: 'GET',
                    data: {id: id},
                    beforeSend: function () {
                        $('tbody').html('<td>Loading..</td>');
                    },
                    success: function (data) {
                        $('tbody').html(data);

                    }
                });
            })
            $('#search').on('keyup',function () {
                let searchResult = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('payment.search.name') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        searchResult: searchResult
                    },
                    beforeSend: function () {
                        $('tbody').html('<td>Loading..</td>');
                    },
                    success: function (data) {
                        console.log(data);
                        $('tbody').html(data);
                    }
                });
            })
        });
    </script>
@endsection
