@extends('adminlte::page')

@section('content')
<table id="tags-table"  class="table">
    <thead>
        <tr>
            <td>Tag Id</td>
            <td>Tag Name</td>
            <td>Tag Slug</td>
            <td> Created_at</td>
            <td>Updated_at</td>
        </tr>
    </thead>
        @foreach($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td>{{$tag->created_at}}</td>
            <td>{{$tag->updated_at}}</td>
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
        $('#tags-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('tag.get_datatable')}}",
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'slug', name:'slug'},
                {data:'created_at', name:'created_at'},
                {data:'updated_at', name:'updated_at',}
            ]
        });
    });
</script>
@stop