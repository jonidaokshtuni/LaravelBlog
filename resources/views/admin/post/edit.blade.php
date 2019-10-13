@extends('adminlte::page')

@section('content')  
<html>
  <h3 class="box-title">Edit Post</h3>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Titles</h3>
    </div>
  <form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
     <div class="box-body">
       <div class="col-lg-6">
       <div class="form-group">
         <label for="title">Post Title</label>
       <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
       </div>
       @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
     @enderror
       <div class="form-group">
          <label for="subtitle">Post Subtitle</label>
       <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" value="{{$post->subtitle}}">
        </div>
        @error('subtitle')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="slug">Post Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
          </div>
        @error('slug')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       </div>
       <div class="col-lg-6">
        <div class="form-group">
          <label for="image">Image</label>
        <input type="file" name="image" id="image" value="{{$post->image}}">
        </div>
        @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group"> 
            <label class="control-label" for="publish_date">Publish Date</label>
            <input class="form-control" id="publish_date" name="publish_date" placeholder="YYYY/MM/DD" type="text"/>
          </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" name="status" @if($post->status==1) checked @endif> Publish
         </label>
       </div>
    </div>
  </div>
<script src="{{URL::to('src./js/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <div class="panel-body">
  <textarea class="textarea"  placeholder="Write content here!" id="body" name="body" style="width: 100%" >{{$post->body}}</textarea>
  <br/> @error('body')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit </button>
      <a  href='{{route('post.index')}}' class="btn btn-warning">Back</a>
    </div>
  </form>
  </div>
  </html>
  @endsection

