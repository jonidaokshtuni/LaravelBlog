@extends('adminlte::page')

@section('content')
<html>
        <h3 class="box-title">Create Category</h3>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Categories</h3>
          </div>
         <form role="form" action="{{ route('category.store') }}"  method="POST">
          {{ csrf_field()}}
           <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
             <div class="form-group">
               <label for="name">Category Title</label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Category Title">
             </div>
             @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
           @enderror
             <div class="form-group">
                  <label for="slug">Category Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
             </div>
             @error('slug')
             <div class="alert alert-danger">{{ $message }}</div>
           @enderror
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <a  href='{{route('category.index')}}' class="btn btn-warning">Back</a>
                </div>
             </div>
           </form>
        </div>
     </div> 
    </div>
@endsection