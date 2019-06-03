@extends('adminlte::page')

@section('content')
<html>
        <h3 class="box-title">Edit Tag</h3>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tags</h3>
          </div>
        <form role="form" action="{{ route('tag.update',$tag->id) }}"  method="POST">
          {{ csrf_field()}}
          {{ method_field('PUT') }}
           <div class="box-body">
             <div class="col-lg-offset-3 col-lg-6">
             <div class="form-group">
               <label for="name">Tag Title</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Tag Title" value="{{$tag->name}}">
             </div>
             @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
           @enderror
              <div class="form-group">
                  <label for="slug">Tag Slug</label>
              <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$tag->slug}}">
                </div>
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit </button>
                <a  href='{{route('tag.index')}}' class="btn btn-warning">Back</a>
                </div>
             </div>
           </form>
        </div>
    </div> 
  </div>
</html>
@endsection