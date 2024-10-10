@extends('backend.master')


@section('content')
<h1>Users Form</h1>



<form action="{{route('users.store')}}" method="post" >
@csrf
  <div class="form-group">
    <label for="name">Enter Users Name</label>
    <input required name="par_name" type="text" class="form-control" id="name" placeholder="Enter users Name">
  </div>

  <div class="form-group">
    <label for="xyz">Select Role Name:</label>
    <select name="role_id" class="form-select" aria-label="Default select example">
      
    @foreach ($allrole as $role)
    
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
     
  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Enter Description</label>
   <textarea class="form-control" name="user_description" id="" placeholder="Enter Description"></textarea>
  </div>

  <div class="form-group">
    <label for="name">Users Email</label>
    <input class="form-control" required name="user_email" type=""  id="" placeholder="Enter user email">
  </div>

  <div class="form-group">
    <label for="name">Users phone</label>
    <input class="form-control" required name="user_phone" type="numbar"  id="" placeholder="Enter user phone">
  </div>

  <div class="form-group">
    <label for="name">Users password</label>
    <input class="form-control" required name="user_password" type="password"  id="" placeholder="Enter user phone">
  </div>

  <div class="form-group">
    <label for="name">Retype-Password</label>
    <input class="form-control" required name="password_confirmation" type="password"  id="" placeholder="Enter user phone">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection