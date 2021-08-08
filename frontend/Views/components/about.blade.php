<div class="container">
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2">
            <h3>Giới thiệu</h3>
            <p class="lead">Là một trong những trung tâm chuyên đào tạo Ngoại ngữ ở TP.Hạ Long,
                trung tâm Ngoại ngữ Asia trở thành
                lựa chọn hàng đầu của những người có nhu cầu học ngoại ngữ
            </p>
        </div>
    </div>
    <!-- end title -->
    @foreach($abouts as $key => $about )
        @if($key % 2 == 0)
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>{!! $about->title !!}</h2>
                        <p>
                            {!! $about->content !!}
                        </p>
                    </div>
                    <!-- end messagebox -->
                </div>
                <!-- end col -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset($about->image_path) }}" alt="" style="width: 540px; height: 360px"
                             class="img-fluid img-rounded">
                    </div>
                    <!-- end media -->
                </div>
                <!-- end col -->
            </div>
        @else
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset($about->image_path) }}" alt="" style="width: 540px; height: 360px"
                             class="img-fluid img-rounded">
                    </div>
                    <!-- end media -->
                </div>
                <!-- end col -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>{!! $about->title !!}</h2>
                        <p>
                            {!! $about->content !!}
                        </p>
                    </div>
                    <!-- end messagebox -->
                </div>
                <!-- end col -->
            </div>
    @endif
@endforeach
<!-- end row -->
</div>
