<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake rounded-circle" src="{{ asset('home/images/logoAsia.png')  }}" alt="AdminLTELogo" height="60" width="60">
    </div>
<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{ $contacts->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    @foreach($contacts->take(3) as $contact)
                        <a href="{{ route('contact.detail',['id' => $contact->id]) }}" class="dropdown-item">

                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('admins/assets/img/user1-128x128.jpg') }}" alt="User Avatar"
                                     class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ $contact->name_parent }}
                                    </h3>
                                    <p class="text-sm">{{ \Illuminate\Support\Str::limit($contact->content,50) }}</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>

                        <div class="dropdown-divider"></div>
                    @endforeach
                    <a href="{{ route('contact.index') }}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
