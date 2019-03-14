@extends('layouts.finder')

@section('content')


   			 <div class="nav fixed">
    	         	 <div class="top-left links">
   						<div class="left-menu-desktop">
							 <a href="{{ route('home') }}">AVALEHT</a>
							@auth
								<a href="{{ url('/admin') }}">ADMIN</a>
							@endauth
						</div>
						
						<div class="left-menu-mobile">
							<a href="/finder/?region={{ $workroom->region }}"><i class="fas fa-chevron-left"> </i></a>
						</div>

              		</div>
                    <div class="top-right links">
                	   <form action="/finder/?region={{ $workroom->region }}" method="get" style="display: inline-block;">
                        <div class="selectize-container">
                            
                            @include ('includes.selectLocation')
                        </div>
                        <div style="display: inline-block; vertical-align: top;">
                        <button type="submit" class="btn btn-success" style="">Leia</button>
                        </div>
                  		</form>
               		 </div>
  			  </div>








<style type="text/css">
  .card { padding: 15px; }
</style>


                <div class="content">
  	             	
  	             	<div class="card">
  	             		<div class="card-header" style="padding-top: 25px; padding-bottom: 35px; border-bottom: 0;">
  	             			<div class="row">
	  	             			<div class="col-md-3 col-sm-3">
	  	             				@if ($workroom->brand_logo)
	  	             				<img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="show-brand-logo"> 
				                	@else
				                	<img src="{{ asset('images/web/logo-missing.gif') }}" width=100% class="show-brand-logo"> 
				                	@endif
	  	             			</div>
	  	             			<div class="col-md-9 col-sm-9">
		            			    <h1 class="single-workroom-title">	{{ $workroom->brand_name }}		 </h1>
	@if ($workroom->phone)			<h5 class="mb-15">	<i class="fa fa-phone fa-fw fa-flip-horizontal"> </i> {{ $workroom->phone }}</h5> @endif
	@if ($workroom->email)		    <h5 class="mb-15">	<i class="fa fa-envelope fa-fw"> </i> {{ $workroom->email }}</h5> @endif
	@if ($workroom->full_address)   <h5 class="mb-15">	<i class="fa fa-map-marker-alt fa-fw"> </i> {{ $workroom->full_address }}</h5> @endif
	@if ($workroom->website_url) 	<h5 class="mb-15">	<i class="fa fa-mouse-pointer fa-fw"> </i> {{ $workroom->website_url }}</h5> @endif
	<h5 class="mb-15">  {{ $company_realname }} </h5>   

	            				</div>
	            			</div>
  	             		</div>




  	             	<div class="card-body" style="padding-top: 35px;">


  	   
  	            	
  	            		



  	             		<div class="row">

  	             			<div class="col-md-5 col-sm-5">
  	             				<h1 style="font-weight: 800; margin-bottom: 25px; color: #1e5ec5; display: table;">Lisainfo</h1>
	  	             			<h5><?php echo nl2br($workroom->additional_info); ?></h5>
  	             			</div>

                      <div class="col-md-7 col-sm-7">
                         @if($workroom->google_maps)  <div id="map" style="height: 400px;"></div> @endif
                      </div>



  	             		</div>



  	             		


  	             	</div>   <!-- Card body end -->






    	            </div>   <!-- Card end -->          









                </div>   <!-- Content end -->


@if($workroom->google_maps)
    <script>
      var geocoder;
      var map;
      var address = "{{ $workroom->google_maps }}";
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: -34.397, lng: 150.644}
        });
        geocoder = new google.maps.Geocoder();
        codeAddress(geocoder, map);
      }

      function codeAddress(geocoder, map) {
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDolblJnj49L7ECZ7YM5MDfztl1IRx2RgQ&callback=initMap">
    </script>
  @endif
                	
@endsection