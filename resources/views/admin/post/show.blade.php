@extends('adminlte::page')
@section('content_header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<a class = 'col-lg-offset-5 btn btn-success'  href="{{ route('post.create')}}"> Add New Post</a>
@stop
@section('content')
<table id="posts"  class="table table-striped table-bordered responsive resourceTable"  style="width: 100%;">
    <thead>
        <tr>
                <th> Id</th>
                <th>User_id</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Slug</th>
                <th>Body</th>
                <th>Status</th>
                <th>Image</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
        </tr>
    </thead>
</table>
@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#posts').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            ajax: {
                url: "{{route('post.index')}}",
              },
            columns: [
                {data:'id', name:'id'},
                {data:'user_id', name:'user_id'},
                {data:'title', name:'title'},
                {data:'subtitle', name:'subtitle'},
                {data:'slug', name:'slug'},
                {data:'body', name:'body'},
                {data:'status', name:'status'},
                {data:'image', name:'image'},
                {data:'created_at', name:'created_at'},
                {data:'updated_at', name:'updated_at'},
                {data: 'action', name: 'action', orderable: false}
            ]
        });
    });
</script>
@stop