@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Feedback History

            </div>
            <div class="div" style="max-height:400px!important;overflow-y: auto!important;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding:25px;">Sl.No</th>
                            <th style="padding:25px;">Property Name</th>
                            <th style="padding:25px;">Total User Feedback</th>
                            <th style="padding:25px;">Last Feedback date</th>
                            <th style="padding:25px;">View All feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($property as $value)
                            <tr>
                                @if ($value->feedback->isNotEmpty())
                                    <td style="padding:86px;">{{ $loop->iteration}}</td>
                                    <td style="padding:25px;">{{ $value->title}}</td>
                                    <td style="padding:25px;">{{ $value->feedback->count()}}</td>
                                    <td style="padding:25px;">
                                        {{ \Carbon\Carbon::parse($value->feedback->last()->created_at)->format('jS F Y h:i:s A') }}
                                    </td>
                                    <td style="padding:25px; text-align: center;">
                                        <a href="{{ route('get.feedback.individual.property',['propertyId'=>$value->id]) }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">View Feedback</a>
                                    </td>
                                @endif
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
