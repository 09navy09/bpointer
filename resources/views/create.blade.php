@extends('layouts')
@section('title', 'Add')
@section('content')
    <div class="container-sm" style="max-width: 500px">
    <h1 class="text-center">Create User</h1>
    <form action="{{ url('users') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="">
            <label for="name">Name:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bio" name="bio" value="">
            <label for="bio">Bio:</label>
        </div>
        <div class="text-center">
        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Create User</button>
    </div>
    </form>
    <div class="text-center">
    <a href="{{ url('users') }}">Back to List</a>
</div>
</div>
@endsection


