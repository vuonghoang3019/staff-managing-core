@extends('admin::layouts.master')
@section('title')
    <title>Course</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Course', 'key' => 'Add Course'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('course.create') }}" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên khóa học</th>
                                <th scope="col">Mức độ</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($courses)  )
                                @foreach($courses as $course)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $course->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach($course->course_grade as $courseItem)
                                                    <li>{{ $courseItem->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.action',['id' => $course->id]) }}"
                                               class="{{ $course->getStatus($course->status)['class'] }}">
                                                {{ $course->getStatus($course->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.edit',['id' => $course->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('course.delete',['id' => $course->id]) }}"
                                               class="btn btn-danger action-delete">Delete

                                            </a>
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
{{--                        {{ $courses->links('pagination::bootstrap-4') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/assets/delete.js') }}"></script>
@endsection
