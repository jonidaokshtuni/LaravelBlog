@extends('adminlte::page')

@section('content')  
<html>
  <h3 class="box-title">Write Post</h3>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Titles</h3>
    </div>
   <form role="form">
     <div class="box-body">
       <div class="col-lg-6">
       <div class="form-group">
         <label for="title">Post Title</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="Title">
       </div>
       <div class="form-group">
          <label for="subtitle">Post Subtitle</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle">
        </div>
        <div class="form-group">
            <label for="slug">Post Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
          </div>
       </div>
       <div class="col-lg-6">
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" id="image">
        </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" name="status">Publish
         </label>
       </div>
       </div>
     
   </form>
  </div>
<script src="{{URL::to('src./js/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <div class="panel-body">
    <textarea class="textarea"  placeholder="Write content here!" name="body" style="width: 100%"></textarea>
  </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primarey">Submit </button>
    </div>
  </div>
  </html>
  @endsection

