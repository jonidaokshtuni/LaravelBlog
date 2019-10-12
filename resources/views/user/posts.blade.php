@extends('user/app')


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
        @endforeach
        <hr>
       
      </div>
    </div>
  </div>

  <hr>
  @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/like.js') }}"></script>
@stop
@endsection