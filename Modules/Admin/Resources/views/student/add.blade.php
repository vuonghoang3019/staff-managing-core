@extends('admin::layouts.master')
@section('title')
    <title>Add Student</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Student', 'key' => 'Add Student'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="code">Nhập mã học sinh</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                       placeholder="Nhập mã học sinh" name="code" value="{{ old('code') }}">
                                @error('code')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="name">Nhập tên học sinh</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nhập tên học sinh" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" class="form-control @error('email') is-invalid @enderror" id="birthday"
                                       placeholder="Nhập email" name="birthday" value="{{ old('birthday') }}">
                                @error('birthday')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <label for="nation">Dân tộc</label>
                                <input type="text" class="form-control @error('nation') is-invalid @enderror" id="nation"
                                       placeholder="Nhập dân tộc" name="nation" value="{{ old('nation') }}">
                                @error('nation')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="classroom_id">Dân tộc</label>
                                <select class="form-control" name="classroom_id">
                                    <option value="">---Mời bạn chọn lớp---</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sex">Giới tính</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="male" value="0" checked>
                                    <label class="form-check-label" for="male">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="female" value="1">
                                    <label class="form-check-label" for="female">
                                        Nữ
                                    </label>
                                </div>
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
    <script src="{{ asset('admins/assets/js/add.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
