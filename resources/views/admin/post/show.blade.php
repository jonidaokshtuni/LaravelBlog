@extends('adminlte::page')
@section('content_header')
<a class = 'col-lg-offset-5 btn btn-success'  href="{{ route('post.create')}}"> Add New Post</a>
@stop
@section('css')
    <link type="text/css" href="./resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/assets/css/jquery.dataTables.min.css">
@stop
@section('content')
<table id="posts"  class="table">
    <thead>
        <tr>
                <td> Id</td>
                <td>User_id</td>
                <td>Title</td>
                <td>Subtitle</td>
                <td>Slug</td>
                <td>Body</td>
                <td>Status</td>
                <td>Image</td>
                <td>Created_at</td>
                <td>Updated_at</td>
        </tr>
    </thead>
</table>
@endsection


@section('js')
<script src="{{ asset('/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#posts').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
             "url": "{!! route("post.getDatatable") !!}",
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
                {data:'updated_at', name:'updated_at'}
            ]
        });
    });
</script>
@stop