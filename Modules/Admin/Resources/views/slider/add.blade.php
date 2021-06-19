@extends('admin::layouts.master')
@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Slider', 'key' => 'Add Slider'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="{{ route('slider.index') }}" class="btn btn-primary">Quay lại</a>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name">Nhập tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nhập tên danh mục" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="description">Nhập mô tả</label>
                                <textarea name="description" class="form-control"
                                          rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="drop-zone ">
                                <span class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload</span>
                                <input type="file" name="image_path" class="drop-zone__input">
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </section>


    </div>

@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
@endsection
