@extends('layouts.main')

@section('content')


<div class="content single">
  @if($workroom->google_maps)  <div id="map" style="height: 250px; border-top-right-radius: 10px; border-top-left-radius: 10px;"></div> @endif
    
    <div class="content-box">
      
      <div class="row">

          <div class="col-md-3">

              <img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="wr-logo">

          </div>

          <div class="col-md-6">

              <h1 class="brand-name">{{ $workroom->brand_name }}</h1>
              <h5 class="company-name">{{ $company_realname }}</h5>
              <div class="contact-info">
              @if ($workroom->phone) 
                <h5 class="mb-15">  <i class="fa fa-phone fa-fw fa-flip-horizontal"> </i> {{ $workroom->phone }}</h5> 
              @endif
              @if ($workroom->email) 
              <h5 class="mb-15">  <i class="fa fa-envelope fa-fw"> </i> {{ $workroom->email }}</h5> 
              @endif
              @if ($workroom->full_address) 
              <h5 class="mb-15">  <i class="fa fa-map-marker-alt fa-fw"> </i> {{ $workroom->full_address }}</h5> 
              @endif
              @if ($workroom->website_url) 
              <h5 class="mb-15">  <i class="fa fa-mouse-pointer fa-fw"> </i> <a class="blue-link" target="_blank" href="{{ $workroom->website_url }}">{{ $workroom->website_url }}</a></h5> 
              @endif
              @if ($workroom->facebook_url) 
              <h5 class="mb-15">  <i class="fab fa-facebook fa-fw"> </i> <a class="blue-link" target="_blank" href="{{ $workroom->facebook_url }}">Facebooki leht</a></h5> 
              @endif
              </div>

          </div>

          <div class="col-md-3">

              <div class="rating-stars">

                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i><br />
                  Arvustused ja kommentaarid (0)

              </div>

          </div>

      </div>





      <div class="row mt-20">

          <div class="col-md-3">

          </div>

          <div class="col-md-6 dashed-top">
              <h3>Lisainfo</h3>
              <p style="font-size: 16px;"> {!! nl2br($workroom->additional_info) !!} </p>

          </div>

      </div>
 
  </div>

</div>

                



 


@if($workroom->google_maps)
    <script>
      var geocoder;
      var map;
      var address = "{{ $workroom->google_maps }}";
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
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
            // alert('Geocode was not successful for the following reason: ' + status);
            document.getElementById('map').style.display = "none";
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDolblJnj49L7ECZ7YM5MDfztl1IRx2RgQ&callback=initMap">
    </script>
  @endif
                	
@endsection