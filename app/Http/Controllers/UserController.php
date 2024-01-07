<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        $checkEmpty=DB::select('select * from users ');
        return view('index', compact('users','checkEmpty'));
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
        ]);

        $user = User::create(['name' => $request->input('name')]);
        $user->profile()->create(['bio' => $request->input('bio')]);

        return redirect('users')->with('add','Employee Added');;
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
        ]);

        $user = User::find($id);
        $user->update(['name' => $request->input('name')]);
        $user->profile->update(['bio' => $request->input('bio')]);

        return redirect()->route('users.index')->with('edit','Employee Updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('users')->with('delete','Employee Deleted');
    }
}
