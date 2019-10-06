@extends('adminlte::page')
@section('content_header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<a class = 'col-lg-offset-5 btn btn-success'  href="{{ route('category.create')}}"> Add New Category</a>
@stop
@section('content')
<table id="categories-table"  class="table table-striped table-bordered responsive resourceTable">
    <thead>
        <tr>
            <td>Category Id</td>
            <td>Category Name</td>
            <td>Category Slug</td>
            <td> Created_at</td>
            <td>Updated_at</td>
            <td>Action </td>
        </tr>
    </thead>
</table>
@endsection


@section('js')
<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
    $(function() {
        $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('category.index')}}",
            },
            columns: [
                {data:'id', name:'id'},
                {data:'name', name:'name'},
                {data:'slug', name:'slug'},
                {data:'created_at', name:'created_at'},
                {data:'updated_at', name:'updated_at'},
                {data: 'action', name: 'action', orderable: false}
            ]
        });
    });
</script>
@stop