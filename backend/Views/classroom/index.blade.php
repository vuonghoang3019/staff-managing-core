@extends('backend::.master.master')
@section('title')
    <title>Classroom</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'Lớp học', 'key' => 'Danh sách lớp học'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('classroom-add')
                        <div class="col-md-12">
                            <a href="{{ route('classroom.create') }}" class="btn btn-success">ADD</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Infomation</th>
                                <th scope="col">Course</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0; ?>
                            @if(isset($classrooms))
                                @foreach($classrooms as $classroom)
                                    <?php $countStudent = \Illuminate\Support\Facades\DB::table('student')->where('classroom_id', $classroom->id)->count() ?>
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $classroom->name }}</td>
                                        <td>{{ $classroom->code }}</td>
                                        <td>
                                            <ul>
                                                <li>Max of Student:{{ $classroom->max_student }}</li>
                                                <li>Min of Student:{{ $classroom->min_student }}</li>
                                                <li>Number of Student: {{ $countStudent }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ $classroom->course->name }}</td>
                                        <td>
                                            {!! $classroom->is_active !!}
                                        </td>
                                        <td>
                                            @can('classroom-update')
                                                <a href="{{ route('classroom.edit',['id' => $classroom->id]) }}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('classroom-delete')
                                                <a href=""
                                                   data-url="{{ route('classroom.delete',['id' => $classroom->id]) }}"
                                                   class="btn btn-danger action-delete">Delete
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
                        {{ $classrooms->links('pagination::bootstrap-4') }}
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
