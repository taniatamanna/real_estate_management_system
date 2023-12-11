@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <!--  User Edit Form -->
        <form id="editUserForm" action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>

            <label for="userType">User Type:</label>
            <select id="userType" name="user_type" required>
                <option value="Admin" {{ $user->utype === 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $user->utype === 'User' ? 'selected' : '' }}>User</option>
            </select>
            <button id="submit-button" type="submit">Update</button>
        </form>
        </div>
    </div>


</main>
<!-- MAIN -->
@endsection
