@extends('layouts.finder')

@section('content')

     
@if(!array_key_exists($region, $regionsArray)) 

<script type="text/javascript">
    window.location = "{{ url('/') }}";//here double curly bracket
</script>

@else


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
                	   <form action="/finder" method="get" style="display: inline-block;">
                        <div class="selectize-container">
                            
                            @include ('includes.selectLocation')
                        </div>
                        <div style="display: inline-block; vertical-align: top;">
                        <button type="submit" class="btn btn-success" style="">Leia</button>
                        </div>
                  		</form>
               		 </div>
  			  </div>


            <div class="content">
                <div class="title">
                    <i class="fa fa-map-marker-alt"> </i> {{ $regionsArray[$region] }}
                </div>
                <div class="subtext">
                {{ count($workrooms) }} töökoda
            	</div>
              
                	<div class="row">
		                @foreach ($workrooms as $workroom)
		                <div class="col-sm-6">
		                

                            <a href="{{ url('/show/'.$workroom->id) }}" class="card-as-link">
		                	<div class="card workroom js-tilt">
		                
		                		<div class="card-body">
		                
		                			<div class="row card-logo-and-text">
			                			
			                			<div class="col-md-2 col-sm-3 col-3">
			                				@if ($workroom->brand_logo) <img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" width=100%> 
			                				@else
			                				<img src="{{ asset('images/web/logo-missing.gif') }}" width=100%> 
			                				@endif
			                			</div>
			                			

			                			<div class="col-md-10 col-sm-9 col-9">
			                				<h5>{{ $workroom->brand_name }}</h5>
			                				{{ $workroom->short_description }}
			                			</div>

			                		</div>



			                		<div class="row card-contact-info">
			                			<div class="col-12">
			                				
			                				@if ($workroom->full_address)
			                					<i class="fas fa-map-marker-alt fa-fw"> </i>
			                					{{ $workroom->full_address }}
			                					<br>
			                				@endif

			                				@if ($workroom->phone)
			                					<i class="fa fa-phone fa-fw fa-flip-horizontal"> </i>
			                					{{ $workroom->phone }}
			                				@endif

			                			</div>

			                		</div>

		                		</div>


		                		<a href="{{ url('/show/'.$workroom->id) }}">
		                				<div class="open-details-btn">
			                					Vaata
			                			</div>       
			                	</a>
		                	</div></a>
		                </div>
		               	@endforeach 
            		</div>


<script src="https://unpkg.com/tilt.js@1.1.21/dest/tilt.jquery.min.js"></script>
<script>
	$('.js-tilt').tilt({
    scale: 1.03,
    maxTilt: 3,
    
})
</script>

@endif
            </div>



        
@endsection
