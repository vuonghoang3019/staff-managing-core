<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('home/images/logoAsia.png') }}" alt=""
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Trung tâm Asia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ \Illuminate\Support\Facades\Auth::user()->image_path }}"
                     class="img-circle elevation-2 bg-white"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-school"></i>
                        <p>
                            Introduce
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'slider.index' ? 'active' : ''}}">
                                <i class="fas fa-images"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'about.index' ? 'active' : ''}}">
                                <i class="fas fa-info-circle"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'contact.index' ? 'active' : ''}}">
                                <i class="fas fa-id-card-alt"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('recruitment.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'recruitment.index' ? 'active' : ''}}">
                                <i class="fas fa-user-plus"></i>
                                <p>
                                    Recruitment
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('news.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'news.index' ? 'active' : ''}}">
                                <i class="fas fa-newspaper"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--School--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-school"></i>
                        <p>
                            School
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('room.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'room.index' ? 'active' : ''}}">
                                <i class="fas fa-door-open"></i>
                                <p>
                                    Room
                                </p>
                            </a>
                        </li>
                        @can('grade-list')
                            <li class="nav-item">
                                <a href="{{ route('grade.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'grade.index' ? 'active' : ''}}">
                                    <i class="fas fa-layer-group"></i>
                                    <p>
                                        Grade
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('course-list')
                            <li class="nav-item">
                                <a href="{{ route('course.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'course.index' ? 'active' : ''}}">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        Course
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('classroom-list')
                            <li class="nav-item">
                                <a href="{{ route('classroom.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'classroom.index' ? 'active' : ''}}">
                                    <i class="fas fa-school"></i>
                                    <p>
                                        Classroom
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('schedule-list')
                            <li class="nav-item ac">
                                <a href="{{ route('schedule.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'schedule.index' ? 'active' : ''}}">
                                    <i class="fas fa-clock"></i>
                                    <p>
                                        Schedule
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                {{--Account--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('teacher-list')
                            <li class="nav-item">
                                <a href="{{ route('teacher.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'teacher.index' ? 'active' : ''}}">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>
                                        Teacher
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('student-list')
                            <li class="nav-item">
                                <a href="{{ route('student.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'student.index' ? 'active' : ''}}">
                                    <i class="fas fa-user-graduate"></i>
                                    <p>
                                        Student
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                {{--system--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tools"></i>
                        <p>
                            System
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('role-list')
                            <li class="nav-item ac">
                                <a href="{{ route('role.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'role.index' ? 'active' : ''}}">
                                    <i class="fas fa-users-cog"></i>
                                    <p>
                                        Role
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('permission-list')
                            <li class="nav-item ac">
                                <a href="{{ route('permission.index') }}"
                                   class="nav-link {{ \Request::route()->getName() == 'permission.index' ? 'active' : ''}}">
                                    <i class="fas fa-user-lock"></i>
                                    <p>
                                        Permission
                                    </p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item ac">
                            <a href="{{ route('payment.index') }}"
                               class="nav-link {{ \Request::route()->getName() == 'payment.index' ? 'active' : ''}}">
                                <i class="fas fa-money-check-alt"></i>
                                <p>
                                    Payment
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ac">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
