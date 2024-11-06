@extends('backend.master')

@section('content')



<div class="row">

  <div class="col-md-6">
    <h1>Users List</h1>
    <a class="btn btn-success" href="{{route('users.create')}}">Create new users</a>
    <a class="btn btn-primary" href="{{route('pdf')}}">User pdf Downloard</a>
    
  </div>

 
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Role Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allUser as $key=>$users)
    <tr>
    <th scope="row">{{$key+1}}</th>
      <td>{{$users->name}}</td>
      <td>{{$users->role->name}}</td>
      <td>{{$users->email}}</td>       
      <td>
      <a href="" class="btn btn-success">Edit</a>
      <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection