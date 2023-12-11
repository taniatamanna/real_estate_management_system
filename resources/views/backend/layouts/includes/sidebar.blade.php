<!-- SIDEBAR -->
<section id="sidebar">
    <a href="{{route('index')}}" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Sell Property</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{route('dashboard')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('show-property') ? 'active' : '' }}">
            <a href="{{route('show-property')}}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Property List</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('get.order') ? 'active' : '' }}">
            <a href="{{ route('get.order') }}">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Order List</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('get.transaction') ? 'active' : '' }}">
            <a href="{{ route('get.transaction') }}">
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">Transections</span>
            </a>
        </li>
        @if(Auth::user()->utype == 'Admin')
        <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
            <a href="{{route('users')}}">
                <i class='bx bxs-group' ></i>
                <span class="text">User List</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->utype == 'Admin')
        <li class="{{ request()->routeIs('get.feedback') ? 'active' : '' }}">
            <a href="{{route('get.feedback')}}">
                <i class='bx bxs-group' ></i>
                <span class="text">User Product Feedback</span>
            </a>
        </li>
        @endif
    </ul>
    <ul class="side-menu">
        {{-- <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li> --}}

        @if(Auth::user())
        <li>
            <a href="{{ route('sign-out') }}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
        @endif
    </ul>
</section>
<!-- SIDEBAR -->
