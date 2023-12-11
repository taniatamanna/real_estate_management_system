@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">{{Auth::user()->utype}}</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">{{Auth::user()->name}}</a>
                </li>
            </ul>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <a href="{{ route('get.order') }}">
                 <i class='bx bxs-calendar-check' ></i>
            </a>
            <a href="{{ route('get.order') }}">
                <span class="text">
                    <h3>{{ $transactionHistory->count() }}</h3>
                    <p>Total Order</p>
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('users') }}">
                <i class='bx bxs-group' ></i>
            </a>
            <a href="{{ route('users') }}">
                <span class="text">
                    <h3>{{ $users->count() }}</h3>
                    <p>Users</p>
                </span>
            </a>

        </li>
        <li>
            <a href="{{ route('get.order') }}">
                <i class='bx bxs-dollar-circle' ></i>
            </a>
            <a href="{{ route('get.order') }}">
                <span class="text">
                    <h3>BDT {{ $transactionHistory->sum('amount')*110.32 }}</h3>
                    <p>Total Sales</p>
                </span>
            </a>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                {{-- <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i> --}}
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactionHistory as $item)
                        <tr>
                            <td>
                                <img src="{{asset('backend/img/people.png')}}">
                                <p>{{ $item->user->name}}</p>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('jS F Y h:i:s A') }}</td>
                            <td>
                                <span class="status completed">
                                    @if($item->status == 0)
                                            Pending
                                    @elseif($item->status == 1)
                                        Approved
                                    @elseif($item->status == 2)
                                        Rejected
                                    @elseif($item->status == 3)
                                        Blocked
                                    @else
                                        Unknown Status
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
