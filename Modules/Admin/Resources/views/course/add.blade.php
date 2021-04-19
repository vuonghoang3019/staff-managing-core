@extends('admin::layouts.master')
@section('title')
    <title>Add course</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Course', 'key' => 'Add Course'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{  route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Nhập tên khóa học</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Nhập tên danh mục" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Chọn mức độ</label>
                        <select class="form-control @error('grade_id') is-invalid @enderror " name="grade_id[]">
                            <option value="">---Mời bạn chọn danh mục---</option>
                        </select>
                        @error('grade_id')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Mô tả</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Nhập tên danh mục" name="name" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>


    </div>

@endsection
