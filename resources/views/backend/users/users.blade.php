@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>User List <a href="{{route('user.create')}}"><button id="submit-button" type="submit" class="status pending" style="border:none;cursor:pointer;margin-left:20px">Add User</button></a></h3>
                
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>{{$value->name}}</p>
                        </td>
                        <td>{{$value->email}}</td>     
                        @if($value->utype == "Admin")                   
                        <td><span class="status pending">{{$value->utype}}</span></td>
                        @else
                        <td><span class="status completed">{{$value->utype}}</span></td>
                        @endif
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('j F, Y h:i A') }}</td>                        
                        <td>
                            <a href="{{route('user.edit',$value->id)}}"><button id="editButton" class="status completed" style="border:none;cursor:pointer">Edit</button></a>
                            <form action="{{ route('user.destroy', ['id' => $value->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="status pending" style="border:none;cursor:pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
