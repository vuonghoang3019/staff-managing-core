@extends('admin::master.master')
@section('title')
    <title>Add Rooms</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Phòng học', 'key' => 'Thêm Phòng học'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('room.store') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="{{ route('room.index') }}" class="btn btn-primary">Quay lại</a>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name">Mã phòng</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id=code"
                                       placeholder="asia-room-1.1" name="code" value="{{ old('code') }}">
                                @error('code')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="name">Tên phòng</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Phòng 1.1" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control "
                                          id="text" name="description" rows="5">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </div>
@endsection
