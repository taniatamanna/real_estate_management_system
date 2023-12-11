<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a href="/" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Sell Property</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" aria-current="page" href="{{route('index')}}">Home</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> --}}
                @if(Auth::user())
                     <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#addModal" class="nav-link">Sell Properties</a></li>
                @else
                    <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#redirect-login-signup" class="nav-link">Sell Properties</a></li>
                @endif
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Properties</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Properties</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Tenants</a></li>
                        <li><a class="dropdown-item" href="#!">Reports</a></li>
                    </ul>
                </li> --}}
                @if(request()->routeIs('index'))
                    <form action="{{ route('index') }}" method="get">
                        @csrf
                        <li class="nav-item" style="margin-left: 40px; margin-top: 3px;">
                            <div class="d-flex">
                                <input type="text" class="form-control" name="search_items" placeholder="Search items..." value="{{ $search_items ?? '' }}">
                                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Search</button>
                            </div>
                        </li>
                    </form>
                @endif
            </ul>
            <form class="d-flex">
                {{-- <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button> --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    @auth
                         <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page" href="{{route('dashboard')}}">Dashboard</a></li>
                    @endauth
                    @if(Auth::user())
                        <li class="nav-item"><a class="nav-link" href="{{ route('sign-out') }}">Logout</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Signup</a></li>
                    @endif
                </ul>
            </form>
        </div>
    </div>
</nav>
