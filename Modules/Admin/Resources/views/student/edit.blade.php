@extends('admin::layouts.master')
@section('title')
    <title>Edit Student</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Student', 'key' => 'Edit Student'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('student.update',['id' => $studentEdit -> id]) }}" method="post" enctype="multipart/form-data" >
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
@endsection
