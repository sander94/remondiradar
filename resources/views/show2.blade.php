@extends('layouts.main')

@section('content')
<style>
.flexbox {
  display: flex;
  flex-direction: column;
}
</style>

<div class="content single">

  <div class="flexbox">
      @if($workroom->google_maps)  <div id="map" class="map" style="position: relative; height: 250px; border-top-right-radius: 10px; border-top-left-radius: 10px;"></div> @endif
        
        <div class="content-box">
          
          <div class="row">

              <div class="col-md-3">

                @if($workroom->brand_logo)
                  <img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="wr-logo">
                @else
                  <img src="{{ asset('images/web/logo-missing.gif') }}" class="wr-logo">
                @endif

              </div>

              <div class="col-md-6">

                  <h1 class="brand-name">{{ $workroom->brand_name }}</h1>
                  <h5 class="company-name">{{ $company_realname }}</h5>
                  <div class="contact-info">
                  @if ($workroom->phone) 
                    <div class="info-row">
                      <div class="icon"> 
                        <i class="fa fa-phone fa-fw fa-flip-horizontal"> </i>
                      </div>
                      <div class="icon-text">
                        {{ $workroom->phone }}
                      </div>
                    </div>
                  @endif
                  @if ($workroom->email) 
                    <div class="info-row">
                      <div class="icon">
                        <i class="fa fa-envelope fa-fw"> </i> 
                      </div>
                      <div class="icon-text">
                        {{ $workroom->email }}
                      </div> 
                    </div>
                  @endif
                  @if ($workroom->full_address) 
                    <div class="info-row">
                      <div class="icon">
                        <i class="fa fa-map-marker-alt fa-fw"> </i> 
                      </div>
                      <div class="icon-text" style="word-break: normal;">
                        {{ $workroom->full_address }}
                      </div> 
                    </div>
                  @endif
                  @if ($workroom->website_url) 
                    <div class="info-row">
                      <div class="icon">
                        <i class="fa fa-mouse-pointer fa-fw"> </i> 
                      </div>
                      <div class="icon-text">
                        <a class="blue-link" target="_blank" href="{{ $workroom->website_url }}">{{ $workroom->website_url }}</a>
                      </div>
                    </div>
                  @endif
                  @if ($workroom->facebook_url) 
                    <div class="info-row">
                      <div class="icon">
                        <i class="fab fa-facebook fa-fw"> </i> 
                      </div>
                      <div class="icon-text">
                        <a class="blue-link" target="_blank" href="{{ $workroom->facebook_url }}">Facebooki leht</a>
                      </div>
                   </div>
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