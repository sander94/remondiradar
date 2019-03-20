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

        </style>
            <script src="{{ asset('js/app.js') }}"></script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.0/js/standalone/selectize.min.js'></script>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css'>



    </head>
    <body>


    	@yield('content')



   
    </body>
</html>
