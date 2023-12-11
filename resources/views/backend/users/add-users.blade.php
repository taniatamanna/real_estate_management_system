<!-- create.blade.php -->

@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <!-- User Create Form -->
            <form id="createUserForm" action="{{ route('user.store') }}" method="post">
                @csrf
        
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                    <br>
                @enderror
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                    <br>
                @enderror
        
                <label for="userType">User Type:</label>
                <select id="userType" name="user_type" required>
                    <option value="Admin">Admin</option>
                    <option selected value="User">User</option>
                </select>
                @error('user_type')
                    <span style="color:red">{{ $message }}</span>
                    <br>
                @enderror
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span style="color:red">{{ $message }}</span>
                    <br>
                @enderror
        
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span style="color:red">{{ $message }}</span>
                    <br>
                @enderror
        
                <button id="submit-button" type="submit">Create</button>
            </form>
        </div>
        
    </div>
</main>
<!-- MAIN -->
@endsection
