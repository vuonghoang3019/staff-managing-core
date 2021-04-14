@extends('admin::layouts.master')
@section('title')
    <title>Add Teacher</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Teacher', 'key' => 'Add Teacher'])
        <section class="content">
            <div class="container-fluid">
                <form action="" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="code">Nhập mã giáo viên</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                   placeholder="Nhập mã giáo viên" name="code" value="{{ old('code') }}">
                            @error('code')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="name">Nhập tên giáo viên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="Nhập tên giáo viên" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="email">Nhập email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   placeholder="Nhập email" name="email" value="{{ old('email') }}">
                            @error('name')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="password">Nhập password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   placeholder="*****" name="password" value="{{ old('password') }}">
                            @error('password')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>


    </div>

@endsection
