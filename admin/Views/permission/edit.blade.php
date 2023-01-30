@extends('admin::master.master')
@section('title')
    <title>Edit Permission</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/checkbox.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Permission', 'key' => 'Edit Permission'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('permission.update',['id' => $permissionEdit -> id]) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Chọn quyền</label>
                            <select class="form-control @error('name') is-invalid @enderror" name="name">
                                <option value="">---Mời bạn chọn chức năng---</option>
                                @foreach($modules as $module)
                                    <option value="{{ $module->name }}"
                                    @if(isset($permissionEdit)) {{ $permissionEdit->name == $module->name ? 'selected' : '' }} @endif
                                    >{{ $module->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <ul class="list-group list-group-flush @error('module_child') is-invalid @enderror">
                                @foreach(config('permission.module_child') as  $data)
                                    <li class="list-group-item">
                                        {{ $data }}
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $data }}"
                                                   {{ $permissionCheck->contains('name',$data) ? 'checked' : '' }}
                                                   name="module_child[]"/>
                                            <span class="danger"></span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                            @error('module_child')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description"
                                      rows="3">{{ old('description',$permissionEdit->description) }}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('permission.index') }}" class="btn btn-primary">Go Back</a>

                </form>
            </div>
        </section>
    </div>
@endsection
