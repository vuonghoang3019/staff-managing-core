@extends('admin::layouts.master')
@section('title')
    <title>Add Classroom</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'classroom', 'key' => 'Add classroom'])
        <section class="content">
            <div class="container-fluid">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="code">Nhập mã lớp</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                       placeholder="Nhập mã lớp" name="code" value="{{ old('code') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="name">Nhập tên lớp</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nhập tên lớp" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="course_id">Chọn khóa học</label>
                                <select class="form-control" name="course_id" >
                                    <option value="">---Mời bạn chọn khóa học---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')

@endsection
