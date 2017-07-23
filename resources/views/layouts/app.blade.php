
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    

       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    

 


 

    <script src="{{asset('js/maps.js')}}"></script>
    <script src="{{asset('js/places.js')}}"></script>
    <script src="{{asset('js/geo.js')}}"></script>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('css/map.css')}}" rel="stylesheet">
    	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/build.css')}}">
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/jquery-ui.structure.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.theme.min.css')}}" rel="stylesheet">

        
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="#about">Enter Incidents</a></li>
            <li><a href="#contact">Contact</a></li>
            
          </ul>

          <ul class="nav navbar-nav navbar-right">

            @if(Auth::check())
            <li><a href="{{url('user/dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
            @else
            <li><a href="{{url('registration')}}">Register</a></li>
            <li><a href="{{url('login')}}">Login</a></li>
           @endif
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  

    <div class="container" style="width:100% !important; position:relative; top:100px">

      @yield("body")

    </div> <!-- /container -->

@yield("map")
 
  </body>
</html>
