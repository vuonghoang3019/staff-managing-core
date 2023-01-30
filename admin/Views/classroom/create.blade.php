@extends('admin::master.master')
@section('title')
    <title>Add Classroom</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Lớp học', 'key' => 'Thêm lớp học'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('classroom.store') }}" method="post">
                    @csrf
                    @include('admin::classroom.form')
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/assets/delete.js') }}"></script>
@endsection
