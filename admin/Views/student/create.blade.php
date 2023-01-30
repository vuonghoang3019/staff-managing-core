@extends('admin::master.master')
@section('title')
    <title>Add Student</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">

@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Học sinh', 'key' => 'Thêm học sinh'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @include('admin::student.form')
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/add.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
@endsection
