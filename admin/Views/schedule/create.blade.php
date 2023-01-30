@extends('admin::master.master')
@section('title')
    <title>Add Schedule</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Lịch  ', 'key' => 'Thêm Lịch'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('schedule.store') }}" method="post">
                    @csrf
                    @include('admin::schedule.form')
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/getAjaxSchedule.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
