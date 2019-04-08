<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
        <meta name="HandheldFriendly" content="true" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Remondiradar.ee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            * { font-family: 'Nunito'; }
            .card { margin-top: 30px; }
        </style>
            <script src="{{ asset('js/app.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137829474-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137829474-1');
</script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.0/js/standalone/selectize.min.js'></script>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    </head>
    <body>
             <div class="nav fixed">
                     <div class="top-left links">
                        <div class="left-menu-desktop">
                             <a href="{{ route('home') }}">
                              <img src="{{ asset('images/web/logo-white.png') }}" width=200>
                             </a>
                            @auth
                                <a href="{{ url('/admin') }}">ADMIN</a>
                            @endauth
                        </div>
                        
                        <div class="left-menu-mobile">
                            <a href="{{ route('home') }}"><i class="fas fa-home"> </i></a>
                        </div>

                    </div>
                    <div class="top-right links">
                       
                     </div>
              </div>
        <div class="content">
          <div class="single-default">

        	@yield('content')

        </div>

         </div>

@include('includes/footer')

    </body>
</html>
