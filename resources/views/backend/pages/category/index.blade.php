@extends('backend.master')

@section('content')


<h1>Category List</h1>

<!-- <button type="button" class="btn btn-primary">Primary</button> -->
<a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>

<table class="table data-table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
</table>

@endsection

@push('js')


<script type="text/javascript">

$(function () {
    console.log("DataTables initialization"); // Debugging line
    let table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajax.category.data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name', searchable: true},
            {data: 'slug', name: 'slug', searchable: true},
            {data: 'description', name: 'description', searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});


</script>
@endpush 