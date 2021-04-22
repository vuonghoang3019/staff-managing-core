@extends('admin::layouts.master')
@section('title')
    <title>Edit Classroom</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Classroom', 'key' => 'Edit classroom'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('classroom.update',['id' => $classroomEdit->id]) }}" method="post">
                    @csrf
                    @include('admin::classroom.form')
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')

@endsection
