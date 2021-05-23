@extends('admin::layouts.master')
@section('title')
    <title>Add Role</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/checkbox_role.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Role', 'key' => 'Add Role'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="margin:50px 0">
                            <!-- Default panel contents -->
                            <div class="card-header">Checkbox to Round Switch</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Bootstrap Switch Warning
                                    <label class="switch ">
                                        <input type="checkbox" class="warning">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Bootstrap Switch Warning
                                    <label class="switch ">
                                        <input type="checkbox" class="warning">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Bootstrap Switch Warning
                                    <label class="switch ">
                                        <input type="checkbox" class="warning">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    Bootstrap Switch Warning
                                    <label class="switch ">
                                        <input type="checkbox" class="warning">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
{{--                <form action="{{ route('grade.store') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-success">Submit</button>--}}


{{--                </form>--}}
            </div>
        </section>
    </div>
@endsection
