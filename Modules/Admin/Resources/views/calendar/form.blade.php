<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="day">Nhập thứ</label>
            <select class="form-control @error('day') is-invalid @enderror" name="day" id="day">
                <option>---Chọn thứ---</option>
                @foreach($weeks as $item => $day)
                    <option value="{{ $item }}"
                            @if(isset($calendarUpdate)) {{ $calendarUpdate->day === $item ? 'selected' : '' }} @endif
                    >{{ $day }}</option>
                @endforeach
            </select>
            @error('day')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="start_time">Start Time</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                   id="start_time"
                   name="start_time"
                   value="{{ old('start_time',isset($calendarUpdate) ? $calendarUpdate->start_time : '') }}">
            @error('start_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="end_time">End Time</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                   id="end_time"
                   name="end_time"
                   value="{{ old('end_time',isset($calendarUpdate) ? $calendarUpdate->end_time : '') }}">
            @error('end_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success">Submit</button>