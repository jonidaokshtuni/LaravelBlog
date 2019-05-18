@extends('adminlte::page')

@section('content')  
<html>
  <h3 class="box-title">Write Post</h3>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Titles</h3>
    </div>
  <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
     <div class="box-body">
       <div class="col-lg-6">
       <div class="form-group">
         <label for="title">Post Title</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="Title">
       </div>
       @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
     @enderror
       <div class="form-group">
          <label for="subtitle">Post Subtitle</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle">
        </div>
        @error('subtitle')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="slug">Post Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
          </div>
        @error('slug')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       </div>
       <div class="col-lg-6">
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" id="image">
        </div>
        @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       <div class="checkbox">
         <label>
           <input type="checkbox" name="status"> Publish
         </label>
       </div>
    </div>
  </div>
<script src="{{URL::to('src./js/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <div class="panel-body">
    <textarea class="textarea"  placeholder="Write content here!" id="body" name="body" style="width: 100%"></textarea>
  <br/> @error('body')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primarey">Submit </button>
    </div>
  </form>
  </div>
  </html>
  @endsection

