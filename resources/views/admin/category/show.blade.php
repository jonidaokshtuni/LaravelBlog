@extends('adminlte::page')

@section('content')
<table id="categories-table"  class="table">
    <thead>
        <tr>
            <td>Category Id</td>
            <td>Category Name</td>
            <td>Category Slug</td>
            <td> Created_at</td>
            <td>Updated_at</td>
        </tr>
    </thead>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
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
        $('#categories-table').DataTable({
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