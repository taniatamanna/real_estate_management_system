@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Feedback History of <b>{{ $property->title }}</b>

            </div>
            <div class="div" style="max-height:400px!important;overflow-y: auto!important;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding:25px;">Sl.No</th>
                            <th style="padding:25px;">User Name</th>
                            <th style="padding:25px;">Comments</th>
                            <th style="padding:25px;">Last Feedback date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedback as $value)
                            <tr>
                                <td style="padding:86px;">{{ $loop->iteration}}</td>
                                <td style="padding:25px;">{{ $value->user->name}}</td>
                                <td style="padding:25px;">{{ $value->comment}}</td>
                                <td style="padding:25px;">
                                    {{ \Carbon\Carbon::parse($value->created_at)->format('jS F Y h:i:s A') }}
                                </td>
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
