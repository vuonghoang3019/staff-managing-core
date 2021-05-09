@extends('admin::layouts.master')
@section('title')
    <title>Add Calendar</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Calendar  ', 'key' => 'Add Calendar'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('calendar.store') }}" method="post">
                @csrf
                @include('admin::calendar.form')
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
