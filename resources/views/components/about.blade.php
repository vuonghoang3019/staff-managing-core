<div class="container">
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2">
            <h3>About</h3>
            <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
                quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!
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
