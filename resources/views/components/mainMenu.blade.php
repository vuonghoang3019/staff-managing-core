<div class="collapse navbar-collapse" id="navbars-host">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        @foreach($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route($category->redirect) }}"
                   id="dropdown-a">
                    {{ $category->name }}
                </a>
                @include('components.menuChild',['category' => $category])
            </li>
        @endforeach
    </ul>
</div>
