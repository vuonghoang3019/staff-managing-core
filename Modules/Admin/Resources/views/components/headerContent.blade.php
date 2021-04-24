<div class="content-header">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success" role="alert" style="position: fixed;right: 2%;bottom: 15%">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ $name }}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $key }}</a></li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
