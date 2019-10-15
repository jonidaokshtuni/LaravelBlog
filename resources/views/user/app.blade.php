<!DOCTYPE html>
<html lang="en">

<head>
       
    @include('user/layouts/head')
  
</head>
    
<body>
        

 @include('user/layouts/header')

@section('main-content')
 @show 
 @section('js')
 <script src="https://js.stripe.com/v3/"></script>
 @show
 @yield('scripts')
  @include('user/layouts/footer')

</body>

</html>
