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
                    <option value="{{ $calendar->id }}">{{ $calendar->day }} {{ $calendar->start_time }}-{{ $calendar->end_time }}</option>
                @endforeach
            </select>
            @error('calendar_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="date">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror"
                   id="date"
                   name="date" value="{{ old('end_time',isset($scheduleEdit) ? $scheduleEdit->calendar->end_time : '') }}">
            @error('date')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success">Submit</button>
