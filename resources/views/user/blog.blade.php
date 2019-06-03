@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Blog Laravel')
@section('sub-heading', 'Jo is creating a blog :p')
@section('main-content')

 <!-- Main Content -->
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $post)
        <div class="post-preview">
        <a href="{{ route ('post', $post) }}">
            <h2 class="post-title">
                 {{ $post->title }} 
            </h2>
            <h3 class="post-subtitle">
                {{ $post->subtitle}} 
            </h3>
          </a>
          <p class="post-meta">Posted by {{$post->user_id}}
          <br/>
          {{$post->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
        <hr>
        <!-- Pager -->
        <ul class="pager">
          
            {{ $posts->links() }}

  
        </ul>
      </div>
    </div>
  </div>

  <hr>

@endsection