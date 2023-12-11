@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Property List <a href="{{route('add-property')}}"><button id="submit-button" type="submit" class="status pending" style="border:none;cursor:pointer;margin-left:20px">Add Property</button></a></h3>

            </div>
            <div class="div" style="max-height:70vh !important;overflow-y: auto!important;">
                <table>
                    <thead>
                        <tr>
                            <th style="padding:25px;">Sl.No</th>
                            <th style="padding:25px;">Image</th>
                            <th style="padding:25px;">Owner</th>
                            <th style="padding:25px;">Title</th>
                            <th style="padding:25px;">Type</th>
                            <th style="padding:25px;">Price </th>
                            <th style="padding:25px;">Old Price</th>
                            <th style="padding:25px;">Bedrooms </th>
                            <th style="padding:25px;">Bathrooms </th>
                            <th style="padding:25px;">Balconies</th>
                            <th style="padding:25px;">kitchens</th>
                            <th style="padding:25px;">Area (sqft)</th>
                            <th style="padding:25px;">Location </th>
                            <th style="padding:25px;">Contact Number </th>
                            <th style="padding:25px;">Contact Email </th>
                            <th style="padding:25px;">Contact Address </th>
                            <th style="padding:25px;">Status </th>
                            <th style="padding:25px;">Created At </th>
                            <th style="padding:25px;width:300px;">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $value)
                            <tr>
                                <td style="padding:86px;">{{ $loop->iteration}}</td>
                                <td style="padding:25px;"><img style="height:100px;width:100px" src="{{asset($value->image)}}" alt="property"></td>
                                <td style="padding:25px;">{{ $value->owner->name}}</td>
                                <td style="padding:25px;">{{ $value->title}}</td>
                                <td style="padding:25px;">{{ $value->property_type}}</td>
                                <td style="padding:25px;"><span style="display: inline;">&#2547;</span><span style="display:inline;">{{ $value->price}}</span></td>
                                <td style="padding:25px;"><span style="display: inline;">&#2547;</span><span style="display:inline;">{{ $value->old_price}}</span></td>
                                <td style="padding:25px;"><span class="status completed">{{ $value->bedrooms}}</span></td>
                                <td style="padding:25px;"><span class="status pending">{{ $value->bathrooms}}</span></td>
                                <td style="padding:25px;"><span class="status completed">{{ $value->balconies}}</span></td>
                                <td style="padding:25px;"><span class="status pending">{{ $value->kitchens}}</span></td>
                                <td style="padding:25px;">{{ $value->size_sqft}}</td>
                                <td style="padding:25px;"><span style="display:inline;">{{ $value->location}}</span></td>
                                <td style="padding:25px;"><span style="display:inline;">{{ $value->contact_number}}</span></td>
                                <td style="padding:25px;"><span style="display:inline;">{{ $value->contact_email}}</span></td>
                                <td style="padding:25px;"><span style="display:inline;">{{ $value->contact_address}}</span></td>
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
                                <td style="padding:25px; width:300px; display: inline-block;"><a href="{{route('property.edit',$value->id)}}"><button id="editButton" class="status completed" style="border:none;cursor:pointer">Edit</button>
                                </a><form action="{{ route('property.destroy', ['id' => $value->id]) }}" method="post" style="display:inline;">@csrf @method('delete')<button type="submit" class="status pending" style="border:none;cursor:pointer">Delete</button></form></td>


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
