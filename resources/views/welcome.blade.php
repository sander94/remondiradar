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

            <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137829474-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137829474-1');
</script>

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
            

            <div class="content home">

                <div class="title">
                    Auto vajab remonti?
                </div>
                <div class="subtext m-b-md">
                    Küsi kiirelt hinnapakkumine kohalikelt töökodadelt!
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
<!--
                    <a href="finder/?region=1" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Pärnu</a>
                    <a href="finder/?region=2" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Tallinn</a>
                    <a href="finder/?region=3" role="button" class="btn btn-success btn-primary btn-lg"><i class="fas fa-search"></i> Tartu</a>
                    <br><br>
                    <a href="{{ url('/hinnaparing') }}">Küsi hinnapakkumisi remonttöödele</a> -->

<style>


.myButton {
    margin-top: 20px;
    -moz-border-radius:24px !important;
    -webkit-border-radius:24px !important;
    border-radius:24px;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-size:18px !important;
    padding:10px 40px !important;
    text-decoration:none;
    letter-spacing: 0 !important;
    text-transform: none !important;
    font-weight: 400 !important;
    transition: all 0.1s ease;
}

.myButton:active {
    position:relative;
    top:1px;
}

.myButton.orange {   background-color: #ff720e;     }
.myButton.green { background-color:#44c767;}

.myButton.green:hover {
    background-color:#24a747;
}
.myButton.orange:hover {
    background-color:#f15900;
}

.menu {
    background-color:#DADADA;
    height: 150px;
    width: 200px;
    display: none;
    margin-left: 20px;
    position: absolute;
    padding: 15px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    display: block;
}

.menu a {
    color: #000;
    font-size: 18px;
    line-height: 35px;
    font-weight: 700;
}
</style>

<div style="display: inline; vertical-align: top; margin-right: 20px;">
 <a href="{{ url('/hinnaparing') }} " class="myButton orange"><i class="fas fa-paper-plane"> </i> Saada hinnapäring</a>
</div>


<div style="display: inline-block; width: 250px; vertical-align: top;">
  <a href="#" id="mainbutton" class="myButton green"><i class="fas fa-search"> </i> Vaata töökodasid</a><br>
      <div class="menu">
           
         <a href="finder/?region=1">Pärnu</a><br>
        <a href="finder/?region=2">Tallinn</a><br>
        <a href="finder/?region=3">Tartu</a><br>






      </div>
</div>

<script>
$(document).ready(function () {
    var menu = $('.menu')
    var timeout = 0;
    var hovering = false;
    menu.hide();

    $('#mainbutton')
        .on("mouseenter", function () {
        hovering = true;
        // Open the menu
        $('.menu')
            .stop(true, true)
            .slideDown(800, "easeOutElastic");

        if (timeout > 0) {
            clearTimeout(timeout);
        }
    })
        .on("mouseleave", function () {
        resetHover();
    });

    $(".menu")
        .on("mouseenter", function () {
        // reset flag
        hovering = true;
        // reset timeout
        startTimeout();
    })
        .on("mouseleave", function () {
        // The timeout is needed incase you go back to the main menu
        resetHover();
    });

    function startTimeout() {
        // This method gives you 1 second to get your mouse to the sub-menu
        timeout = setTimeout(function () {
            closeMenu();
        }, 100);
    };

    function closeMenu() {
        // Only close if not hovering
        if (!hovering) {
            $('.menu').stop(true, true).slideUp(400);
        }
    };

    function resetHover() {
        // Allow the menu to close if the flag isn't set by another event
        hovering = false;
        // Set the timeout
        startTimeout();
    };
});
</script>

                </div>
            </div>
        </div>

        
@include('includes/footer')
    </body>
</html>
