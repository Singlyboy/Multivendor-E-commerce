<!DOCTYPE html>
<html>
<head>
    <title>StS.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>StS all user blade</p>
      
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Role Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{$user->role->name}}</td>
      <td>{{ $user->email }}</td>
    </tr>
    @endforeach

  
</body>
</html>