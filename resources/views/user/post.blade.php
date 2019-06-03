@extends('user/app')

@section('bg-img', $post->image)
@section('title', $post->title)
@section('sub-heading', $post->subtitle)

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <small>Created at {{ $post->created_at}} </small><br>
        <small>Created by {{ $post->user_id}} </small><br>
        @foreach ($post->categories as $category)
            <small>Categories : {{$category->name}} </small>
        @endforeach

          {!! htmlspecialchars_decode($post->body) !!}

        <h3>Tags</h3>
        @foreach ($post->tags as $tag)
          <small> {{$tag->name}} </small>
        @endforeach
        </div>
      </div>
    </div>
  </article>

  <hr>
@endsection