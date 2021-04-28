@extends('admin::layouts.master')
@section('title')
    <title>Student</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Student', 'key' => 'List student'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('student.create') }}" class="btn btn-success">ADD</a>
                        <a href="{{ route('student.create') }}" class="btn btn-success" id="filter" name="filter">Tìm
                            kiếm</a>
                    </div>

                    <div class="col-md-12 form-inline mt-2 mb-2">
                        <div class="form-group col-md-4">
                            <label for="">Lớp:</label>
                            <select class="form-control ml-2 classroom" name="classroom_id"
                                    data-url="{{ route('student.ajaxGetSelect') }}">
                                <option>---Chọn đi bro---</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Tên:</label>
                            <input type="text" class="form-control ml-2" id="search">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Trạng thái:</label>
                            <select class="form-control ml-2">
                                <option>---Chọn đi bro---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Dân tộc</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="dataTable">
                            <?php $stt = 0 ?>
                            @if(isset($students))
                                @foreach($students as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->birthday }}</td>
                                        <td>{{ $data->sex === 0 ? 'nam' : 'nữ' }}</td>
                                        <td>{{ $data->nation }}</td>
                                        <td>{{ $data->classroom->name }}</td>
                                        <td>
                                            <a href="{{ route('classroom.action',['id' => $data->id]) }}"
                                               class=" {{ $data->getStatus($data->status)['class'] }}">
                                                {{ $data->getStatus($data->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('student.edit',['id' => $data->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('student.delete',['id' => $data->id]) }}"
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
                        {{ $students->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/assets/delete.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.classroom').change(function (event) {
                event.preventDefault();
                let url = $(this).data('url');
                let id = $(this).val();
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: {id: id},
                    success: function (students) {
                        $('.dataTable').html(students);

                    }
                });
            })
        });
        $('body').on('keyup', '#search', function () {
            let searchResult = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route("student.search") }}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchResult: searchResult
                },
                success: function (res) {
                    let tableRow = '';
                    $('.dataTable').html('');
                    $.each(res, function (index, value) {
                        tableRow += ' <tr>';
                        tableRow += '<th scope="row">' + index + '</th>';
                        tableRow += '<th scope="row">' + value.name + '</th>';
                        tableRow += '<th scope="row">' + value.code + '</th>';
                        tableRow += '<th scope="row">' + value.birthday + '</th>';
                        tableRow += '<th scope="row">' + value.sex + '</th>';
                        tableRow += '<th scope="row">' + value.nation + '</th>';
                        tableRow += '<th scope="row"><a href="{{ route('student.create ') }}" class="btn btn-default">Edit</a></th>';
                        tableRow += ' </tr>';
                        $('.dataTable').html(tableRow);
                    })

                }

            });
        })
    </script>
@endsection
