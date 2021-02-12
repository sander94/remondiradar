@extends('layouts.main')

@section('content')


    <div class="content single">

        <div class="content-box">

            <div class="row">

                <div class="col-md-3">

                    @if($workroom->brand_logo)
                        <img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="wr-logo">
                    @else
                        <img src="{{ asset('images/web/logo-missing.gif') }}" class="wr-logo">
                    @endif

                </div>

                <div class="col-md-5">

                    <h1 class="brand-name">{{ $workroom->brand_name }}</h1>
                    <h5 class="company-name">{{ $company_realname }}</h5>
                    <div class="contact-info" id="contact">
                        <div class="info-row" v-if="!showPrivate">
                            <div class="icon">
                                <i class="fa fa-eye fa-fw fa-flip-horizontal"> </i>
                            </div>
                            <div class="icon-text">
                                <a href="#" class="blue-link" @click.prevent="onPrivateClick">
                                    Näita kontaktandmeid
                                </a>
                            </div>
                        </div>
                        @if ($workroom->phone)
                            <div class="info-row" v-if="showPrivate">
                                <div class="icon">
                                    <i class="fa fa-phone fa-fw fa-flip-horizontal"> </i>
                                </div>
                                <div class="icon-text">
                                    <a href="tel:{{ $workroom->phone }}">{{ $workroom->phone }}</a>
                                </div>
                            </div>
                        @endif
                        @if ($workroom->email)
                            <div class="info-row" v-if="showPrivate">
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
                                    <a class="blue-link" target="_blank"
                                       href="{{ $workroom->website_url }}">{{ $workroom->website_url }}</a>
                                </div>
                            </div>
                        @endif
                        @if ($workroom->facebook_url)
                            <div class="info-row">
                                <div class="icon">
                                    <i class="fab fa-facebook fa-fw"> </i>
                                </div>
                                <div class="icon-text">
                                    <a class="blue-link" target="_blank" href="{{ $workroom->facebook_url }}">Facebooki
                                        leht</a>
                                </div>
                            </div>
                        @endif


                    </div>

                </div>


                <div class="col-md-4">

                    <ul style="display: none;">
                        @foreach($services as $service)
                            <li>
                                <a href="{{ route('region.workrooms', ['region' => $workroom->region, 'services' => $service->getKey()]) }}">{{ $service->title }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="openingtimes">
                        <?php
                        // Short list of weekdays.
                        $arrayOfWeekdays = ['E', 'T', 'K', 'N', 'R', 'L', 'P'];
                        $i = 0;

                        // For each timeslot
                        foreach ($timeslots as $timeslot) {

                            echo "<strong style=\"margin-right: 10px; font-weight: 700;\">" . $arrayOfWeekdays[$i] . "</strong>";
                            echo " ";

                            // If its closed, say closed
                            if ($timeslot->open_type == "Suletud") {
                                echo "suletud";
                            } // if its opened on agreement, say opened on agreement
                            elseif ($timeslot->open_type == "Avatud kokkuleppel") {
                                echo "avatud kokkuleppel";
                            } // else show both times
                            else {
                                echo $timeslot->from;
                                echo " – ";
                                echo $timeslot->to;
                            }
                            echo "<br>";

                            $i++;
                        }
                        ?>
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
                    $avgrating = 0;
                    $percentage = 0;
                }

                ?>

                <a href="#reviews">
                    <div class="rating-stars">
                        <div class="stars-rating">
                            <div class="stars-score" style="width: {{ $percentage }}%">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="stars-scale">
                                <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i><i class="far fa-star"></i>
                            </div>
                        </div>
                        <br>
                        Arvustused ({{ count($reviews) }})

                    </div>
                </a>


            </div>


            <div class="row mt-20">


                <div class="col-md-8 offset-md-3 dashed-top">
                    <h3>Lisainfo</h3>
                    <p style="font-size: 16px;"> {!! nl2br($workroom->additional_info) !!} </p>
                    @if($workroom->google_maps)
                        <div id="gmap" class="map"
                             style="position: relative; height: 250px; border-top-right-radius: 10px; border-top-left-radius: 10px;"></div> @endif
                </div>

                <div class="col-md-1">

                </div>

            </div>


            <div class="row mt-20">
                <div class="col-md-3">

                </div>
                <div class="col-md-8">
                    @if(count($reviews) > 0)
                        <h3 id="reviews">Arvustused</h3>
                    @endif

                    @foreach($reviews as $review)


                        <div class="comment-card">
                            <div class="row comment-card-content">
                                <div class="star-column">
                                    <?php

                                    for ($i = 0; $i <= 4; $i++) {


                                        if ($i < $review->stars) {
                                            echo '<i class="fas fa-star"> </i>';
                                        } else {
                                            echo '<i class="far fa-star"> </i>';
                                        }
                                    }

                                    ?>

                                    <p class="review-datetime">{{ $review->created_at->format('d.m.Y') }}</p>
                                </div>
                                <div class="comment-column">
                                    <h5 class="review-name">{{ $review->name }}</h5>
                                    <p>{{ $review->comment }}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>

    </div>








    @if($workroom->google_maps)
        <script>
            var geocoder;
            var gmap;
            var address = "{{ $workroom->google_maps }}";

            function initMap() {
                var gmap = new google.maps.Map(document.getElementById('gmap'), {
                    zoom: 10,
                    center: @json(['lat' => (float)$workroom->lat, 'lng' => (float)$workroom->lng])
                });


                const position = @json(['lat' => (float)$workroom->lat, 'lng' => (float)$workroom->lng]);

                const marker = new google.maps.Marker({
                    position,
                    map: gmap
                });
            }


        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDolblJnj49L7ECZ7YM5MDfztl1IRx2RgQ&callback=initMap">
        </script>


    @endif


    <script>

        const app = new Vue({
            el: '#contact',

            data() {
                return {
                    showPrivate: false
                }
            },

            methods: {
                onPrivateClick() {
                    this.showPrivate = true;

                    axios.post(@json(route('contact_click', $workroom)))
                }
            }
        });


        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                            ;
                        });
                    }
                }
            });

    </script>

@endsection
