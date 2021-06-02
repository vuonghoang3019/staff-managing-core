<div class="collapse navbar-collapse" id="navbars-host">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
        @foreach($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">{{ $category->name }} </a>
                @include('components.menuChild',['category' => $category])
            </li>
        @endforeach
    </ul>
</div>
