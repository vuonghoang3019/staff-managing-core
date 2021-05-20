<!-- Modal -->
<div class="modal fade" id="actionPermission" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Chọn quyền</label>
                        <select class="form-control @error('name') is-invalid @enderror" name="name">
                            <option value="">---Mời bạn chọn chức năng---</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->name }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                        @error('name')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <ul class="list-group list-group-flush @error('module_child') is-invalid @enderror">
                            @foreach(config('permission.module_child') as  $data)
                                <li class="list-group-item">
                                    {{ $data }}
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $data }}" name="module_child[]"/>
                                        <span class="danger"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        @error('module_child')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


