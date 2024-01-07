@if (Session::has('delete'))
    <div class="bg-danger">
        <h3 class="text-white">{{ Session::get('delete') }}</h3>
    </div>
@elseif(Session::has('edit'))
    <div class="bg-info">
        <h3 class="text-white">{{ Session::get('edit') }}</h3>
    </div>
    @elseif(Session::has('add'))
    <div class="bg-success">
        <h3 class="text-white">{{ Session::get('add') }}</h3>
    </div>
    @endif
    @extends('layouts')
    @section('title', 'Dashboard')
    @section('content')
        <h1 class="text-center">Users List</h1>
        <div class="container-sm">
            <table class="table table-striped table-hover table-bordered table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($checkEmpty)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->profile->bio }}</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-block" href="{{ route('users.edit', $user->id) }}"
                                    role="button">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="" id=""
                                        class="btn btn-danger btn-sm btn-block">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <h4 class="text-center text-danger">Record Not Found</h4>
                    @endif
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ url('/users/create') }}"><button type="button" name="addButton" id="addButton"
                        class="btn btn-info btn-lg btn-block w-100">Add User</button>
            </div>
        </div>
    @endsection
