@extends('adminlte::page')

@section('content')
<table id="posts-table"  class="table">
    <thead>
        <tr>
                <td>Post Id</td>
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
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->user_id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->subtitle }}</td>
        <td>{{ $post->slug }}</td>
        <td>{{ $post->body}}</td>
        <td>{{ $post->status}}</td>
        <td>{{ $post->image }}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
    </tr>
    @endforeach
</table>
@endsection


@section('js')
<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
     $(function() {
        $('#posts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('post.get_datatable')}}",
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