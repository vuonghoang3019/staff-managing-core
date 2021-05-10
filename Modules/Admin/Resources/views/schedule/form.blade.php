<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="classroom_id">Lớp</label>
            <select class="form-control " name="classroom_id">
                <option value="">---Chọn lớp---</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}"
                            @if(isset($scheduleEdit)) {{ $scheduleEdit->classroom_id === $classroom->id ? 'selected' : '' }} @endif
                    >{{ $classroom->name }}</option>
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
                    <option value="{{ $teacher->id }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->teacher_id === $teacher->id ? 'selected' : '' }} @endif
                    >{{ $teacher->name }}</option>
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
                    <option value="{{ $course->id }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->course_id === $course->id ? 'selected' : '' }} @endif
                    >{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start_time">Chọn lịch</label>
            <select class="form-control " name="calendar_id">
                <option value="">---Chọn lịch---</option>
                @foreach($calendars as $calendar)
                    <option value="{{ $calendar->id }}"
                            @if(isset($scheduleEdit)) {{ $scheduleEdit->calendar_id === $calendar->id ? 'selected' : '' }} @endif
                    >{{ $calendar->day }} {{ $calendar->start_time }}-{{ $calendar->end_time }}</option>
                @endforeach
            </select>
            @error('calendar_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="date_start">Ngày dự kiến bắt đầu</label>
            <input type="date" class="form-control @error('date_start') is-invalid @enderror"
                   id="date"
                   name="date_start" value="{{ old('date_start',isset($scheduleEdit) ? $scheduleEdit->date_start : '') }}">
            @error('date_start')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="date_end">Ngày dự kiến kết thúc</label>
            <input type="date" class="form-control @error('date_end') is-invalid @enderror"
                   id="date_end"
                   name="date_end" value="{{ old('date_end',isset($scheduleEdit) ? $scheduleEdit->date_end : '') }}">
            @error('date_end')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success">Submit</button>
