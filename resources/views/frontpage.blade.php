@extends('layouts.main')

@push('js-body')
    <script>

        @if(isset($workrooms[0]))
        function initMap() {
            let myLatLng = @json(['lat' => (float) ($region->lat ?? $workrooms[0]->lat), 'lng' => (float) ($region->lng ?? $workrooms[0]->lng)]);

            let map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: myLatLng
            });

            const workrooms = @json($mapWorkrooms);
            const markers = [];
            const views = [];

            @foreach($mapWorkrooms as $workroom)
            views.push('@include('googlemaps.infobox', $workroom)');
            @endforeach

            const icons = {
                parking: {
                    icon: "/map_icon.svg",
                },
            };

            workrooms.forEach((item, key) => {

                let infoWindow = new google.maps.InfoWindow({
                    content: views[key]
                });

                const {lat, lng} = item;
                const position = {lat: parseFloat(lat), lng: parseFloat(lng)};
                const marker = new google.maps.Marker({
                    position,
                    icon: {
                        url: "/map/marker.svg", // url
                        scaledSize: new google.maps.Size(40, 40),
                    },
                    map: map
                });

                markers.push(marker);

                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });

            });
        }
        @endif
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key={{ config('services.google.key') }}&sensor=false&callback=initMap">
    </script>
@endpush
@section('content')


    <div class="content finder">

        @if(!empty($workrooms))
            <div id="map-container"
                 style=" @if(!!\Illuminate\Support\Facades\Cookie::get('map_disabled')) display:none; @endif">
                <div id="map"
                     style="height: 400px; @if(!!\Illuminate\Support\Facades\Cookie::get('map_disabled')) display:none; @endif"></div>
            </div>
        @endif
        <div class="row">
            @foreach($advertisements as $advertisement)
                <div class="col wr-card-container">

                    <a href="{{ route('record_advertisement', $advertisement) }}" target="_blank">

                        <div class="wr-card" style="padding: 0; overflow: hidden; height: 280px;">

                            <div class="row headline-logo" style="background-image: url('{{ $advertisement->getFirstMediaUrl('image') }}'); background-size: cover; background-position: center center; height: 100%;">

                                <div class="col-12">

                                    <h3 style="text-align: center; color: #FFFFFF; margin-top: 30px;">{{ $advertisement->title }}</h3>


                                </div>

                            </div>

                        </div>

                    </a>

                </div>
            @endforeach
        </div>

        <div class="row">

            @forelse($workrooms as $workroom)

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 wr-card-container js-tilt">

                    <a href="/tookoda/{{ $workroom->slug }}">

                        <div class="wr-card">

                            <div class="blue-line"></div>

                            <div class="row headline-logo">

                                <div class="col-8">

                                    <h3>{{ $workroom->brand_name }}</h3>

                                    <p>{{ substr($workroom->short_description, 0, 160) }}</p>


                                </div>

                                <div class="col-4">
                                    @if($workroom->brand_logo)
                                        <img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}"
                                             class="wr-logo">
                                    @else

                                    @endif
                                </div>

                            </div>

                            <div class="row dashed-top">

                                <div class="col-12 col-sm-12">

                                    <div class="info-row">

                                        <div class="icon"><i class="fas fa-map-marker-alt fa-fw"> </i></div>

                                        <div class="icon-text"> {{ $workroom->full_address }}</div>

                                    </div>

                                    <div class="info-row">

                                        <div class="icon"><i class="fas fa-phone fa-flip-horizontal fa-fw"> </i></div>

                                        <div class="icon-text"> {{ $workroom->phone }} </div>

                                    </div>


                                </div>


                                <?php
                                // Calculate average rating
                                $rating = 0;
                                foreach ($workroom->reviews as $review) {
                                    $rating = $rating + $review->stars;
                                }


                                if (count($workroom->reviews) > 0) {
                                    $avgrating = round($rating / count($workroom->reviews), 2);
                                    $percentage = ($avgrating / 5) * 100;
                                } else {
                                    $percentage = 0;
                                }

                                ?>


                                <div class="finder-starcontainer">
                                    <div class="rating-stars" style="position: relative;">


                                        <div class="stars-rating">
                                            <div class="stars-score" style="width: {{ $percentage }}%">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i>
                                            </div>
                                            <div class="stars-scale">
                                                <i class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i>
                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>

                        </div>

                    </a>

                </div>
            @empty
                <div>
                    No results
                </div>
            @endforelse


        </div>

    </div>




@endsection
