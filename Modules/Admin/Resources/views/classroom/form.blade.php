<button type="submit" class="btn btn-success">Lưu</button>
<a href="{{ route('classroom.index') }}" class="btn btn-primary">Quay lại</a>
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="code">Nhập mã lớp</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                   placeholder="Nhập mã lớp" name="code"
                   value="{{ old('code',isset($classroomEdit) ? $classroomEdit->code : '') }}">
            @error('code')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="name">Nhập tên lớp</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   placeholder="Nhập tên lớp" name="name"
                   value="{{ old('name',isset($classroomEdit) ? $classroomEdit->name : '') }}">
            @error('name')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="name">Nhập số lượng học sinh</label>
            <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" min="0" max="12"
                    name="number"
                   value="{{ old('number',isset($classroomEdit) ? $classroomEdit->number : '') }}">
            @error('number')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="course_id">Chọn khóa học</label>
                <select class="form-control @error('course_id') is-invalid @enderror" name="course_id">
                <option value="">---Mời bạn chọn khóa học---</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        @if(isset($classroomEdit)) {{$classroomEdit->course_id === $course->id ? 'selected' : ''}} @endif>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Mã</th>
                <th scope="col">Số lượng học viên(tối đa)</th>
                <th scope="col">Khóa học</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $stt = 0 ?>
            @if(isset($classrooms))
                @foreach($classrooms as $data)
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->code }}</td>
                        <td>{{ $data->number }}</td>
                        <td>{{ $data->course->name }}</td>
                        <td>
                            <a href="{{ route('classroom.action',['id' => $data->id]) }}"
                               class=" {{ $data->getStatus($data->status)['class'] }}">
                                {{ $data->getStatus($data->status)['name'] }}
                            </a>
                        </td>
                        <td>
                            @can('classroom-update')
                                <a href="{{ route('classroom.edit',['id' => $data->id]) }}"
                                   class="btn btn-default">Edit</a>
                            @endcan
                            @can('classroom-delete')
                                <a href=""
                                   data-url="{{ route('classroom.delete',['id' => $data->id]) }}"
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

