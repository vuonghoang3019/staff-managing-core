@extends('admin::master.master')
@section('title')
    <title>Edit Role</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/checkbox_role.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Quyền hệ thống', 'key' => 'Sửa quyền'])
        <section class="content">
            <div class="container-fluid" style="background-color: #ecf0f1">
                <form action="{{ route('role.update',['id' => $roleEdit -> id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="{{ route('role.index') }}" class="btn btn-primary">Quay lại</a>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="code">Nhập mã quyền</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                       placeholder="Nhập mã" name="code" value="{{ old('code',$roleEdit->code) }}">
                                @error('code')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nhập tên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nhập tên quyền" name="name"
                                       value="{{ old('name',$roleEdit->name) }}">
                                @error('name')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="description">Nhập mô tả</label>
                                <textarea class="form-control "
                                          id="text" name="description"
                                          rows="4">{{ old('description',$roleEdit->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row ml-5">
                        @foreach($permissions as $permission)
                            <div class="card col-md-3 mt-3 ml-4">
                                <!-- Default panel contents -->
                                <div class="card-header"> {{ $permission->name }}</div>
                                <ul class="list-group list-group-flush">
                                    @foreach($permission->child as $item)
                                        <li class="list-group-item">
                                            {{ $item->name.' '.$permission->name }}
                                            <label class="switch ">
                                                <input type="checkbox" class="warning" value="{{ $item->id }}"
                                                       {{ $roleCheck->contains('id',$item->id) ? 'checked' : '' }}
                                                       name="permissionID[]">
                                                <span class="slider round"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </div>
                </form>


            </div>
        </section>
    </div>
@endsection
