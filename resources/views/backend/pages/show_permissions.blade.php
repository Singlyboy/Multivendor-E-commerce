@extends('backend.master')


@section('content')

<div class="container">
  <div class="row">
        
        <div class="col-6">
        <h1>Role Form</h1>
            <form action="{{route('admin.permission.assign',$role_id)}}" method="post">
              @csrf
              @foreach($permissions as $permission)
              <div class="form-group">
                <label for="">{{$permission->name}}</label>
                <input 
                @if(in_array($permission->id,$rolePermissions)) checked

               @endif 
               
                type="checkbox" name="permission[]" value="{{$permission->id}}">
              </div>

              @endforeach


              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        

  </div>
</div>





@endsection