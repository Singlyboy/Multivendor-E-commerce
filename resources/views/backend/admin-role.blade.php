@extends('backend.master')

@section('content')

<h1>Role List</h1>

<a class="btn btn-primary" href="{{route('admin.role.form')}}">Create admin_role</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($allrol as $key=>$role)
 
<tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$role->name}}</td>
      <td>{{$role->description}}</td>
        <td>
        
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>

@endforeach
   

    
  </tbody>
</table>

{{ $allrole->links() }}

@endsection