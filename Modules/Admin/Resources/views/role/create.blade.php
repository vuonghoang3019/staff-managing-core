@extends('admin::layouts.master')
@section('title')
    <title>Add Role</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Role', 'key' => 'Add Role'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    @include('admin::role.form')
                </form>
            </div>
        </section>
    </div>
@endsection
