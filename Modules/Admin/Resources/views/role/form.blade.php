<div class="form-group col-md-6">
    <label for="name">Nhập tên</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
           placeholder="Nhập tên mức độ" name="name" value="{{ old('name') }}">
    @error('name')
    <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group col-md-6">
    <label for="description">Nhập mô tả</label>
    <textarea class="form-control "
              id="text" name="description" rows="3">{{ old('description') }}</textarea>
    @error('description')
    <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-success">Submit</button>
