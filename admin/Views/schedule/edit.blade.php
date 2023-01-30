@extends('backend::master.master')
@section('title')
    <title>Edit Schedule</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'Schedule  ', 'key' => 'Edit Schedule'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('schedule.update',['id' => $scheduleEdit->id ]) }}" method="post">
                @csrf
                @include('backend::schedule.form')
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/getAjaxSchedule.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
