@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Order History

            </div>
            <div class="div" style="max-height:400px!important;overflow-y: auto!important;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding:25px;">Sl.No</th>
                            <th style="padding:25px;">Buyer Name</th>
                            <th style="padding:25px;">Order Item Name</th>
                            <th style="padding:25px;">Payment Via</th>
                            <th style="padding:25px;">Amount</th>
                            <th style="padding:25px;">Status</th>
                            <th style="padding:25px;">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactionHistory as $value)
                            <tr>
                                <td style="padding:86px;">{{ $loop->iteration}}</td>
                                <td style="padding:25px;">{{ $value->user->name}}</td>
                                <td style="padding:25px;">{{ $value->property->title}}</td>
                                <td style="padding:25px;">{{ $value->payment_method}}</td>
                                <td style="padding:25px;">BDT {{ $value->amount*110.32}}</td>
                                <td style="padding: 25px;">
                                    @if($value->status == 0)
                                        Pending
                                    @elseif($value->status == 1)
                                        Approved
                                    @elseif($value->status == 2)
                                        Rejected
                                    @elseif($value->status == 3)
                                        Blocked
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td style="padding:25px;">{{ \Carbon\Carbon::parse($value->created_at)->format('jS F Y h:i:s A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
