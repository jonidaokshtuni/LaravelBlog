 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ route ('home') }}">Jonida Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      @isHome
     <p>on home</p>
      @else
     <p> not home</p>
      @endisHome
      <div class="collapse navbar-collapse" id="navbarResponsive">
       
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('home') }}">Home</a>
          </li>

          <li class="nav-item">
          <a class="nav-link" href="{{ route ('posts') }}">All posts ({{$postsCount->count()}})</a>
            </li>
        @if(Sentinel::check())
          <li class="nav-item" role="presentation">
              <form action="/logout"  method="POST" id="logout-form">
                {{ csrf_field() }}

                <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
              </form>
          </li>
        @else
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item" role="presentation">
              <a class="nav-link" href="/register">Register</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>@yield('title')</h1>
            <span class="subheading">@yield('sub-heading')</span>
          </div>
        </div>
      </div>
    </div>
  </header>