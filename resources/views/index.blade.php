@extends('master.master')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <!-- carouse -->
    @include('components.slider')
    <!-- End carouse -->

    <!-- about -->
    <div id="overviews" class="section wb">
        @include('components.about')
    </div>

    <!-- End about -->

    <!-- timeline -->
    <section class="section lb page-section">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Our history</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                        lorem
                        quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!
                    </p>
                </div>
            </div>
            <!-- end title -->
            <div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2018</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2015</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2014</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2012</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2010</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2007</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2004</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <div class="timeline__item">
                            <div class="timeline__content img-bg">
                                <h2>2002</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque
                                    condimentum lacus dapibus. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End timeline -->

    <!-- Info -->
    <div class="section cl">
        <div class="container">
            <div class="row text-left stat-wrap">
                <div class="col-md-4 col-sm-4 col-xs-12">
                            <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                                <i class="fas fa-book-reader"></i>
                            </span>
                    <p class="stat_count">{{ count($students) }}</p>
                    <h3>Students</h3>
                </div>
                <!-- end col -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                            <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                                <i class="fas fa-book-open"></i>
                            </span>
                    <p class="stat_count">{{ count($courses) }}</p>
                    <h3>Courses</h3>
                </div>
                <!-- end col -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                            <span data-scroll class="global-radius icon_wrap effect-1 alignleft">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </span>
                    <p class="stat_count">{{ count($users) }}</p>
                    <h3>Teacher</h3>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- End info -->

    <!-- Plan -->
    <div id="overviews" class="section wb">
        <div class="container">
            <!--  title -->
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                        lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Học phí thấp - Hiệu quả cao</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Để sử dụng tiếng anh thành thạo, học viên cần học 1450 giờ (A1,2,B1,2,C1,2). Qúa
                                    trình học lâu dài và
                                    rất tốn kém. Tại asia mức học phí thấp, chất lượng cao, học sinh có thể an tâm học
                                    lâu dài.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Học thử miễn phí - Càng học càng rẻ</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>Học thử miễn phí từ 1-2 tuần trước khi học chính thức. Học viên đã học tại Asia
                                    Center từ 6
                                    tháng trở lên sẽ được giảm học phí khi đăng ký các khóa tiếp theo
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Dạy các kỹ năng học tập ưu việt miễn phí</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>Học viên của trung tâm không chỉ được học Tiếng Anh mà còn được đào tạo miễn phí các
                                    kỹ năng đọc nhanh, ghi chép hiệu quả
                                    tư duy sáng tạo...phương pháp học tập mới nhất
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Hỗ trợ trả gớp với lãi suất 0%</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Với học viên đăng ký khóa từ 6 tháng trở lên, sẽ được hỗ trợ trả góp học phí với lãi suất 0%.
                                    Thật tuyệt vời khi chỉ hưởng khuyến mại từ khóa 6 tháng, 12 tháng phải không nào?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="hr3">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Học lại miễn phí khi kiểm tra chưa đạt</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Được học lại miễn phí khi kết quả kiểm tra định kỳ dưới 50% điểm trung bình các bài kiểm tra toàn
                                    khóa(không áp dụng với học sinh nghỉ quá 4 buổi/ khóa)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Báo cáo học tập và học bổng cho học sinh giỏi</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Được gửi nản kiểm tra nói (video), bài kiểm tra viết, phiếu nhận xét học tập định kỳ 3 tháng 1 lần
                                    (Tính theo thời gian của lớp học, không theo thời gian nhập học).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Đánh giá năng lực theo chuẩn quốc tế</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Học viên được dào tạo theo chương trình chuẩn quốc tế của ĐH OXFORD/CAMBRIDE. Chương trình xuyên suốt
                                    cho mọi lứa tuổi từ mẫu giáo đến người đi làm.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <div class="course-item">
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">Học với giáo viên nước ngoài</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>
                                    Được học giáo viên nước ngoài hiệu quả nhất, phát triển cân bằng 4 kỹ năng Nghe hiểu - Nói -
                                    Đọc hiểu - Viết luận, đáp ứng cả nhu cầu của trường học và nhu cầu ứng dụng thực tiễn của học viên.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- end container -->
    </div><!-- end section -->
    <!-- End plan -->
@endsection
