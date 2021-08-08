<div id="testimonials" class="parallax section db parallax-off">
    <div class="container">
        <div class="section-title text-center">
            <h3>Những người sáng lập</h3>
            <p></p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    @foreach($users as $user)
                        <div class="testimonial clearfix">
                            <div class="testi-meta">
                                <img src="{{ asset($user->image_path) }}" alt="" class="img-fluid" style="background-color: white">
                                <h4>{{ $user->name }}</h4>
                            </div>
                            <div class="desc">
                                <p class="lead">{{ $user->description }}</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                    @endforeach


                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
