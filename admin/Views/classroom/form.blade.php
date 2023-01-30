<button type="submit" class="btn btn-success">Save</button>
<a href="{{ route('classroom.index') }}" class="btn btn-primary">Back</a>
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="code">Code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                   placeholder="Nhập mã lớp" name="code"
                   value="{{ old('code',isset($classroomEdit) ? $classroomEdit->code : '') }}">
            @error('code')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   placeholder="Nhập tên lớp" name="name"
                   value="{{ old('name',isset($classroomEdit) ? $classroomEdit->name : '') }}">
            @error('name')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="course_id">Courses</label>
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
    <div class="col-md-6">
        <div class="form-group ">
            <label for="name">Max of Student</label>
            <input type="number" class="form-control @error('max_student') is-invalid @enderror" id="max_student" min="0" max="12"
                   name="max_student"
                   value="{{ old('max_student',isset($classroomEdit) ? $classroomEdit->max_student : '') }}">
            @error('max_student')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="name">Min of Student</label>
            <input type="number" class="form-control @error('min_student') is-invalid @enderror" id="min_student" min="0" max="12"
                   name="min_student"
                   value="{{ old('min_student',isset($classroomEdit) ? $classroomEdit->min_student : '') }}">
            @error('min_student')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

