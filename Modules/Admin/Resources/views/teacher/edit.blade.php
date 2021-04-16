@extends('admin::layouts.master')
@section('title')
    <title>Edit Teacher</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Teacher', 'key' => 'Add Teacher'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('teacher.update',['id' => $teacherEdit->id]) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="code">Nhập mã giáo viên</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                       placeholder="Nhập mã giáo viên" name="code" value="{{ old('code',$teacherEdit->code) }}">
                                @error('code')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="name">Nhập tên giáo viên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nhập tên giáo viên" name="name" value="{{ old('name',$teacherEdit->name) }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="email">Nhập email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Nhập email" name="email" value="{{ old('email',$teacherEdit->email) }}">
                                @error('email')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="password">Nhập password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                       placeholder="*****" name="password" value="{{ old('password',$teacherEdit->password) }}">
                                @error('password')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Password">Chọn trình độ</label>
                                <select name="grade_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach ($grades as $data)
                                        <option
                                            value="{{ $data->id }}" {{ $teacherGrade->contains('id',$data->id) ? 'selected' : '' }}>{{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="drop-zone ">
                                <span class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload</span>
                                <input type="file" name="image_path" class="drop-zone__input" value="{{ $teacherEdit->image_path }}">
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>


    </div>

@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
    <script src="{{ asset('admins/assets/js/add.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
