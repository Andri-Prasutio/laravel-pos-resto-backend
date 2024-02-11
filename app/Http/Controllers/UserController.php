<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
     $users = User::all();
        return view ('pages.users.index',compact('users'));
    }

    public function create()
    {
        return view ('pages.users.create');
    }

    public function store(Request $request)
    {
    // validate the request...
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'role' => 'required|in:admin,staff,user',
        ]);

        // store the request...
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view ('pages.users.edit', compact('user'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required|in:admin,staff,user',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        if ($request->password) {
        $user->password = Hash::make($request->password);
        $user->save();
        }

        return redirect()->route('users.index')->with('success', 'user sucessfully Updated');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user sucessfully Deleted');

    }
}
