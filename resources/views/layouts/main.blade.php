<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <meta name="HandheldFriendly" content="true"/>
    <meta property="og:image" content="{{ $og_image }}"/>
    <meta property="og:title" content="Remondiradar.ee"/>
    <meta property="og:description" content="Sirvi töökodasid või saada hinnapäring kõigile töökodadele korraga!"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137829474-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-137829474-1');
    </script>


    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Hotjar Tracking Code for remondiradar.ee -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 2014850, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    <style>

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 58px;
            height: 28px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f1f1f1;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 24px;
            left: 4px;
            right: 4px;
            bottom: 2px;
            background-color: #e44a4a;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #f1f1f1;
        }

        input:checked + .slider:before {
            background-color: #06b333;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 18px;
        }

        .slider.round:before {
            border-radius: 18px;
        }


        .maptoggle {
            float: right;
            color: #FFFFFF;
        }

        .maptoggle span.text {
            margin-right: 10px;
            font-weight: 500;
        }

    </style>

    @stack('js')
</head>

<body>

<div class="nav-bar">
    <div class="nav-bar-content">

        <div class="row">
            <div class="col-md-6 col-sm-4 col-7">
                <a href="/"><img src="{{ asset('images/web/logo-white.png') }}" class="logo"></a>
            </div>
            <div class="col-md-6 col-sm-8 col-5">
                <a href="/hinnaparing" class="button yellow"><span
                        class="ask-offer-text-desktop">Küsi hinnapakkumisi</span><span
                        class="ask-offer-text-mobile">Hinnapäring</span></a>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-12">
                <h2 class="heading white">
                    Leia sobiv remonditöökoda siit!
                </h2>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-12 col-md-12">


                <div class="button finder-button" style="text-align: left; padding-left: 20px; position: relative;"
                     id="region-menu-activator">
                    <span id="showRegionName">{{ $regionName }}</span>
                    <i class="fas fa-map-marker-alt fa-fw" style="position: absolute; top: 13px; right: 14px;"> </i>
                </div>
                <div class="button finder-button" style="text-align: left; padding-left: 20px; position: relative;"
                     id="services-menu-activator">
                    <span id="showServicesTitles">Vali teenused</span>
                    <i class="fas fa-wrench fa-fw" style="position: absolute; top: 13px; right: 14px;"> </i>
                </div>

                <div id="filter">
                    <div class="button finder-button" @click.prevent="onFilterSubmit">
                        <button>Submit</button>
                    </div>

                    <!-- Let's try filtering without submit button, but here's the code for the button in case of trouble

                    <button type="submit" class="finder-button">
                    <div class="button" style="text-align: left; padding-left: 20px; position: relative;">
                        Leia
                        <i class="fas fa-search fa-fw" style="position: absolute; top: 13px; right: 14px;"> </i>
                    </div>
                    </button>

                    -->
                    <div class="region-menu">


                        <div class="row">


                            <div class="col-sm-6 col-md-4" v-for="regionItem in regions">

                                <label class="region-object">
                                    <input type="radio" name="region" :value="regionItem.id"
                                           v-model="region"
                                           :data-name="regionItem.region_name">
                                    <span>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                @{{ regionItem.region_name }}
                                </span>
                                </label>

                                <br>

                            </div>


                        </div>


                    </div>

                    <div class="services-menu">


                        <div class="row">

                            <div class="col-sm-6 col-md-4" v-for="service in services">
                                <label class="service-object">
                                    <input type="checkbox" v-model="selected" name="service" :value="service.id"
                                           :data-name="service.title">
                                    <span>
                                  <i class="fas fa-caret-right fa-fw"> </i>
                                  @{{ service.title }}</span>
                                </label>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="maptoggle">
                    <span class="text">Kaart</span>
                    <label class="switch">
                        <input type="checkbox" id="mapCheckbox"
                               @if(!\Illuminate\Support\Facades\Cookie::get('map_disabled')) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="nav-bar-slope"></div>


@yield('content')


@include('includes/footer')

<script src="https://unpkg.com/tilt.js@1.1.21/dest/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.03,
        maxTilt: 3
    })
</script>
<script>
    $(".region-menu").hide();
    $("#region-menu-activator").show();
    $('#region-menu-activator').click(function (e) {
        $(".region-menu").slideToggle();
        e.stopPropagation();
        $(".services-menu").slideUp();
    });

    $(document).on('click', function (e) {
        if (!$('.region-menu').is(":hover")) {
            $('.region-menu').slideUp();
        }
    });

    $(".services-menu").hide();
    $("#services-menu-activator").show();
    $('#services-menu-activator').click(function (e) {
        $(".services-menu").slideToggle();
        e.stopPropagation();
        $(".region-menu").slideUp();
    });

    $(document).on('click', function (e) {
        if (!$('.services-menu').is(":hover")) {
            $('.services-menu').slideUp();
        }
    });

    let timeout = null;

    new window.Vue({
        el: '#filter',
        data() {
            return {
                services: @json($services),
                regions: @json($allRegions),
                region: @json(optional(request()->route('region'))->getKey() ?? null),
                selected: {!! json_encode(request()->query('services') ? explode(',', request()->query('services')) : [])  !!}
            }
        },

        methods: {
            onFilterSubmit() {
                window.location.replace(this.url)
            }
        },

        computed: {
            url() {
                let url = "{{ url() }}";

                if (this.region) {
                    url = url + '/region/' + this.region
                }

                if (this.selected.length > 0) {
                    let query = "services=" + this.selected.join(',');

                    url = url + '?' + query.toString();
                }

                return url;
            }
        },


    })

    const checkbox = document.getElementById('mapCheckbox')
    const map = document.getElementById('map')
    const mapcontainer = document.getElementById('map-container')

    checkbox.addEventListener('change', (event) => {
        axios.post(@json(route('toggleMap')))
            .then(response => {
                console.log(response.data);
                map.style.display = response.data.disabled ? 'none' : 'block'
                mapcontainer.style.display = response.data.disabled ? 'none' : 'block'
            })
    })

</script>


@stack('js-body')


<script>
    $(document).ready(function () {
        $('input:radio[name="region"]').change(function () {
            $('#showRegionName').html($(this).data('name'));
        });

        var checkedArray = [];
        $('input:checkbox[name="service"]').each(function () {
            if (this.checked) {
                checkedArray.push($(this).data('name'));
            }
        })

        if (checkedArray.length > 1) {
            arrayCount = checkedArray.length;
            $("#showServicesTitles").html('Valitud ' + arrayCount + ' teenust');
        }
        if (checkedArray.length == 1) {
            $("#showServicesTitles").html(checkedArray);
        }
        if (checkedArray.length == 0) {
            $("#showServicesTitles").html('Vali teenused');
        }
    });
</script>
</body>
</html>
