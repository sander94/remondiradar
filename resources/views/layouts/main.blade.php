<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
        <meta name="HandheldFriendly" content="true" />
		<meta property="og:image" content="{{ $og_image }}" />
		<meta property="og:title" content="Remondiradar.ee" />
		<meta property="og:description" content="Sirvi töökodasid või saada hinnapäring kõigile töökodadele korraga!" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Styles -->
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

        
       	<script src="{{ asset('js/app.js') }}"></script>

           




</head>
  
	<body>

		<div class="nav-bar">
			<div class="nav-bar-content">

				<div class="row">
					<div class="col-md-6 col-sm-4 col-7">
						<a href="/"><img src="{{ asset('images/web/logo-white.png') }}" class="logo"></a>
					</div>
					<div class="col-md-6 col-sm-8 col-5">
						<a href="/hinnaparing" class="button yellow"><span class="ask-offer-text-desktop">Küsi hinnapakkumisi</span><span class="ask-offer-text-mobile">Hinnapäring</span></a>
					</div>
				</div>

				<div class="row mt-20">
					<div class="col-12">
						<h2 class="heading white">
							Aitab otsimisest - sobiva remonditöökoja leiad siit!
						</h2>
					</div>
				</div>

				<div class="row mt-20">
					<div class="col-12 col-md-12">
						<a href="/?region=1" class="button @if($region == '1') selected @endif"> Tallinn </a>
						<a href="/?region=2" class="button @if($region == '2') selected @endif"> Tartu </a>
						<a href="/?region=3" class="button @if($region == '3') selected @endif"> Pärnu </a>
					</div>
				</div>

			</div>
		</div>
		<div class="nav-bar-slope"> </div>


	@yield('content')
    

	@include('includes/footer')

	<script src="https://unpkg.com/tilt.js@1.1.21/dest/tilt.jquery.min.js"></script>
<script>              
	$('.js-tilt').tilt({
    scale: 1.03,
    maxTilt: 3
})
</script>
    
    </body>
</html>
