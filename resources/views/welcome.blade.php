<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Remondiradar.ee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Styles -->

        
            <script src="{{ asset('js/app.js') }}"></script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.0/js/standalone/selectize.min.js'></script>

            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>
        .content { text-align: center; }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">


                <div class="top-left links">
                     <img src="{{ asset('images/web/logo-white.png') }}" width=200>
                </div>

                <div class="top-right links">

                   <!--  <a href="{{ url('/hinnaparing') }}">REMONDIHINNA PÄRING</a> -->

                    @auth
                        <a href="{{ url('/admin') }}">ADMIN</a>
                    @endauth


                </div>
            

            <div class="content">

                <div class="title">
                    Auto vajab remonti?
                </div>
                <div class="subtext m-b-md">
                    Leia kiirelt kohalik remonditöökoda
                </div>

                <div class="links">
                   <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css'>
             
                    <form action="finder/" method="get">
                        <div class="selectize-container">
                            @include ('includes.selectLocation', ['region' => '0'])
                        </div>
                        <div style="display: inline-block; vertical-align: top;">
                        <button type="submit" class="btn btn-success find-btn"><i class="fas fa-search"> </i> Leia</button>
                        </div>
                    </form> -->

                    <a href="finder/?region=1" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Pärnu</a>
                    <a href="finder/?region=2" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Tallinn</a>
                    <a href="finder/?region=3" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Tartu</a>
                </div>
            </div>
        </div>
    </body>
</html>
