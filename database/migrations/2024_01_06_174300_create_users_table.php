<?php

// UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->profile()->create($request->input('profile'));
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::with('profile')->find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validation

        $user = User::find($id);
        $user->update($request->all());
        $user->profile->update($request->input('profile'));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
