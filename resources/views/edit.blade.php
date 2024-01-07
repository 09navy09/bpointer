@extends('layouts')
@section('title', 'Update')
@section('content')
    <div class="container-sm" style="max-width: 500px">
    <h1 class="text-center">Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            <label for="name">Name:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bio" name="bio" value="{{ $user->profile->bio }}">
            <label for="bio">Bio:</label>
        </div>
        <div class="text-center">
        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Update User</button>
        </div>
    </form>
    <div class="text-center">
    <a href="{{ route('users.index') }}">Back to List</a>
    </div>
</div>
@endsection
