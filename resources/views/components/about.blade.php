<div id="overviews" class="section wb">
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
                            <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non
                                aliquam
                                risus. Sed a tellus quis mi rhoncus dignissim.
                            </p>
                            <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus
                                faucibus
                                bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et
                                magnis
                                montes, nascetur ridiculus mus. Sed vitae rutrum neque.
                            </p>
                            <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                        </div>
                        <!-- end messagebox -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="post-media wow fadeIn">
                            <img src="{{ asset('home/images/1200px-Sun-group-logo.png') }}" alt=""
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
                            <img src="{{ asset('home/images/1200px-Sun-group-logo.png') }}" alt=""
                                 class="img-fluid img-rounded">
                        </div>
                        <!-- end media -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="message-box">
                            <h2>{!! $about->title !!}</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus
                                faucibus
                                bibendum.
                            </p>
                            <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                        </div>
                        <!-- end messagebox -->
                    </div>
                    <!-- end col -->
                </div>
        @endif
    @endforeach
    <!-- end row -->
    </div>
    <!-- end container -->
</div>
