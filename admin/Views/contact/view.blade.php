@extends('admin::master.master')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Category', 'key' => 'Add Category'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="">Họ và tên phụ huynh</label>
                            <input type="text" class="form-control"  value="{{ $contactDetail->name_parent }}" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="">Họ và tên học sinh</label>
                            <input type="text" class="form-control" value="{{ $contactDetail->name_student }}" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="redirect">Số điện thoại</label>
                            <input type="text" class="form-control" value="{{ $contactDetail->phone }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ $contactDetail->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea class="form-control" rows="4" readonly>{{ $contactDetail->content }}</textarea>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contact.index') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </section>
    </div>
@endsection
@section('js')
@endsection
