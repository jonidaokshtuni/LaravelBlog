@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Blog Laravel')
@section('sub-heading', 'Jo is creating a blog :p')
@section('main-content')
 <!-- Main Content -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $post)
          <div class="post" data-postid="{{ $post->id }}">
        <div class="post-preview">
        <a href="{{ route ('post', $post) }}">
            <h2 class="post-title">
                 {{ $post->title }} 
            </h2>
            <h3 class="post-subtitle">
                {{ $post->subtitle}} 
            </h3>
          </a>
          <p class="post-meta">Posted by {{$post->user->first_name}}
          <br/>
          {{$post->created_at->diffForHumans() }}</p>
        
          <div class="interaction">
            <a href="#" class="like">{{ Sentinel::getUser()->likes()->where('post_id', $post->id)->first() ? Sentinel::getUser()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
            <a href="#" class="like">{{ Sentinel::getUser()->likes()->where('post_id', $post->id)->first() ? Sentinel::getUser()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You dont like this post' : 'Dislike' : 'Dislike'  }}</a>
         </div>
       
          <hr>
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
  @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ asset('js/like.js') }}"></script>
  <script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
  </script>
@stop
@endsection