<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('admins/assets/img/AdminLTELogo.png') }}" alt=""
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admins/assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{--                <li class="nav-item">--}}
                {{--                    <a href="#" class="nav-link">--}}
                {{--                        <i class="nav-icon fas fa-chart-pie"></i>--}}
                {{--                        <p>--}}
                {{--                            Charts--}}
                {{--                            <i class="right fas fa-angle-left"></i>--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nav nav-treeview">--}}
                {{--                        <li class="nav-item ac">--}}
                {{--                            <a href="pages/charts/chartjs.html" class="nav-link">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>ChartJS</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item">--}}
                {{--                            <a href="pages/charts/flot.html" class="nav-link">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Flot</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item">--}}
                {{--                            <a href="pages/charts/inline.html" class="nav-link">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Inline</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item">--}}
                {{--                            <a href="pages/charts/uplot.html" class="nav-link">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>uPlot</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="pages/gallery.html" class="nav-link">--}}
                {{--                        <i class="nav-icon far fa-image"></i>--}}
                {{--                        <p>--}}
                {{--                            Gallery--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ \Request::route()->getName() == 'category.index' ? 'active' : ''}}">
                        <i class="fas fa-bars"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('grade.index') }}" class="nav-link {{ \Request::route()->getName() == 'grade.index' ? 'active' : ''}}">
                        <i class="fas fa-layer-group"></i>
                        <p>
                            Grade
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link {{ \Request::route()->getName() == 'teacher.index' ? 'active' : ''}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>
                            Teacher
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}" class="nav-link {{ \Request::route()->getName() == 'course.index' ? 'active' : ''}}">
                        <i class="fas fa-book"></i>
                        <p>
                            Course
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('classroom.index') }}" class="nav-link {{ \Request::route()->getName() == 'classroom.index' ? 'active' : ''}}">
                        <i class="fas fa-school"></i>
                        <p>
                            Classroom
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link {{ \Request::route()->getName() == 'student.index' ? 'active' : ''}}">
                        <i class="fas fa-user-graduate"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
