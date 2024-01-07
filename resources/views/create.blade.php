<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
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
    <a href="{{ url('index') }}">Back to List</a>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

