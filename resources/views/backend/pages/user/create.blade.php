@extends('backend.master')


@section('content')
<h1>Users Form</h1>



<form action="{{ route('users.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Enter User's Name</label>
        <input required name="user_name" type="text" class="form-control" id="name" placeholder="Enter user's Name">
    </div>

    <div class="form-group">
        <label for="xyz">Select Role Name:</label>
        <select name="role_id" class="form-control" aria-label="Default select example">
            @foreach ($allrole as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="email">User's Email</label>
        <input class="form-control" required name="user_email" type="email" id="email" placeholder="Enter user email">
    </div>

    <div class="form-group">
    <label for="password">User's Password</label>
    <input class="form-control" required name="password" type="password" id="password" placeholder="Enter password">
</div>

<div class="form-group">
    <label for="password_confirmation">Retype-Password</label>
    <input class="form-control" required name="password_confirmation" type="password" id="password_confirmation" placeholder="Retype password">
</div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection