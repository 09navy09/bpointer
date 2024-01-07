<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            // Add other validation rules as needed
        ]);

        $user = User::create(['name' => $request->input('name')]);
        $user->profile()->create(['bio' => $request->input('bio')]);

        return redirect('users');
    }

    public function edit($id)
    {
        $user = User::with('profile')->find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            // Add other validation rules as needed
        ]);

        $user = User::find($id);
        $user->update(['name' => $request->input('name')]);
        $user->profile->update(['bio' => $request->input('bio')]);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('users');
    }
}
