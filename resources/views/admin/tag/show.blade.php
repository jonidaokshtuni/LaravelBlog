@extends('adminlte::page')
@section('content_header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<a class = 'col-lg-offset-5 btn btn-success'  href="{{ route('tag.create')}}"> Add New Tag</a>
@stop
@section('content')
<table id="tags"  class="datatable mdl-data-table datatable" cellspacing="0" role="grid">
    <thead>
        <tr>
            <th>Tag Id</th>
            <th>Tag Name</th>
            <th>Tag Slug</th>
            <th> Created_at</th>
            <th>Updated_at</th>
            
        </tr>
    </thead>
</table>
@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
     $(document).ready(function () {
        $('#tags').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('tag.get_datatable')}}",
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'slug', name:'slug'},
                {data:'created_at', name:'created_at'},
                {data:'updated_at', name:'updated_at',},
               // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop