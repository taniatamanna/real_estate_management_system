<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = User::get();

        return view('backend.users.users',['data'=>$data]);
    }

    public function create()
    {
        return view('backend.users.add-users');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'user_type' => 'required|in:Admin,User',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'utype' => $request->input('user_type'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.users.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->utype = $request->input('user_type');

        $user->save();

        return redirect()->route('users', ['id' => $id])->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users')->with('error', 'User deleted successfully!');
        }

        return redirect()->route('users')->with('error', 'User not found!');
    }
}
