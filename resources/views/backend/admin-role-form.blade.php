@extends('backend.master')


@section('content')
<h1>admin_role_form</h1>



<form action="{{route('admin.role.store')}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Enter Role Name</label>
    <input name="role_name" required type="text" class="form-control" id="name" placeholder="Enter Role Name">
  </div>

  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Enter Status</label>
    <select name="role_status" id="" class="form-control">
      <option value="">--select--</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    </select>
   
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection