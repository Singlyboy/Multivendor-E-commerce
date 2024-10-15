@extends('backend.master')


@section('content')




<form action="{{route('admin.role.update',$allrole->id)}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Enter Role Name</label>
    <input value="{{$allrole->name}}" name="role_name" required type="text" class="form-control" id="name" placeholder="Enter Role Name">
  </div>

  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Enter Description</label>
   <textarea class="form-control" name="role_description" id="" placeholder="Enter Description"></textarea>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection