<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="classroom_id">Lớp</label>
            <select class="form-control " name="classroom_id">
                <option value="">---Chọn lớp---</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
            @error('classroom_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="teacher_id">Giáo Viên</label>
            <select class="form-control " name="teacher_id">
                <option value="">---Chọn giáo viên---</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            @error('teacher_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="course_id">Khóa học</label>
            <select class="form-control " name="course_id">
                <option value="">---Chọn khóa học---</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            <label for="day">Nhập thứ</label>
            <input type="text" class="form-control @error('day') is-invalid @enderror" id="day"
                   placeholder="Monday-Sunday" name="day" value="{{ old('day') }}">
            @error('day')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="start_time">Start Time</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                   id="start_time"
                   name="start_time" value="{{ old('start_time') }}">
            @error('start_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="end_time">End Time</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                   id="end_time"
                   name="end_time" value="{{ old('end_time') }}">
            @error('end_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success">Submit</button>
