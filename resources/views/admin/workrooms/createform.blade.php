<div class="form-group row">
    <label for="is_active" class="col-md-4 col-form-label text-md-right">Avalikusta kohe</label>
    <div class="col-md-6">
        {!! Form::checkbox('is_active', 1, true) !!}
    </div>
</div>

<input type="hidden" id="lat" value="{{ old('lat') ?? $workroom->lat ?? null }}" name="lat">
<input type="hidden" id="lng" value="{{ old('lng') ?? $workroom->lng ?? null }}" name="lng">


<div class="form-group row">
    <label for="brand_name" class="col-md-4 col-form-label text-md-right">Töökoja / brändi nimetus</label>
    <div class="col-md-6">
        {!! Form::text('brand_name', null, ['placeholder'=>'Brändi, töökoja nimi', 'class' => 'form-control', 'id' => 'brand_name']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Kontakt e-mail</label>
    <div class="col-md-6">
        {!! Form::text('email', null, ['placeholder'=>'E-mail päringute saamiseks', 'class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">Kontakttelefon</label>
    <div class="col-md-6">
        {!! Form::text('phone', null, ['placeholder'=>'Töökoja telefoninumber', 'class' => 'form-control', 'id' => 'phone']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">Töökoja aadress</label>
    <div class="col-md-6">
        {!! Form::text('full_address', null, ['placeholder'=>'Aadress', 'class' => 'form-control', 'id' => 'address']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="region" class="col-md-4 col-form-label text-md-right">Piirkond, milles töökoda asub</label>
    <div class="col-md-6">
        <select name="region" class="form-control">
            @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="region" class="col-md-4 col-form-label text-md-right">Services</label>
    <div class="col-md-6">
        @foreach($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="service-{{$service->getKey()}}" value="{{ $service->getKey() }}" name="services[]">
                <label class="form-check-label" for="service-{{$service->getKey()}}">{{ $service->title }}</label>
            </div>
        @endforeach
    </div>
</div>


<div class="form-group row">
    <label for="region" class="col-md-4 col-form-label text-md-right">Google Maps - vali täpne asukoht
        rippmenüüst</label>
    <div class="col-md-6">
        {!!  Form::text('google_maps', null, ['placeholder' => 'Google aadress', 'class' => 'form-control', 'id' => 'googleInput']) !!}
    </div>
</div>

<script>
    var geocoder;
    var map;
    var address = "";
    var marker;


    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: @json(['lat' => 0, 'lng' => 0])
        });
        marker = new google.maps.Marker({
            map: map,
            draggable:true,
            position: @json(['lat' => 0, 'lng' => 0])
        });

        var input = document.getElementById('googleInput');
        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);

            let {lat, lng} = marker.getPosition();
            document.getElementById('lat').value = lat();
            document.getElementById('lng').value = lng();

        });

        google.maps.event.addListener(marker, 'dragend', function()
        {
            let {lat, lng} = marker.getPosition();
            document.getElementById('lat').value = lat();
            document.getElementById('lng').value = lng();
        });
    }
</script>




<div class="form-group row">
    <label for="short_description" class="col-md-4 col-form-label text-md-right">Lühitutvustus<br>
        <span id="chars">150</span> tähte</label>
    <div class="col-md-6">
        {!! Form::textarea('short_description', null, ['placeholder'=>'Müügitekst', 'class' => 'form-control char-textarea', 'id' => 'short_description', 'style' => 'height: 100px', 'maxlength' => '150']) !!}


        <script>
            var maxLength = 150;
            $('#short_description').keyup(function () {
                var length = $(this).val().length;
                var length = maxLength - length;
                $('#chars').text(length);
            });
        </script>


    </div>
</div>

<div class="form-group row">
    <label for="additional_info" class="col-md-4 col-form-label text-md-right">Pikem kirjeldus - hinnakiri,
        teenused</label>
    <div class="col-md-6">
        {!! Form::textarea('additional_info', null, ['placeholder'=>'Töökoja pikem kirjeldus', 'class' => 'form-control', 'id' => 'additional_info', 'style' => 'height: 150px']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="website_url" class="col-md-4 col-form-label text-md-right">Kodulehe aadress</label>
    <div class="col-md-6">
        {!! Form::text('website_url', null, ['placeholder'=>'https://', 'class' => 'form-control', 'id' => 'address']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="facebook_url" class="col-md-4 col-form-label text-md-right">Facebooki aadress</label>
    <div class="col-md-6">
        {!! Form::text('facebook_url', null, ['placeholder'=>'https://facebook.com/', 'class' => 'form-control', 'id' => 'address']) !!}
    </div>
</div>


<div class="form-group row">
    <label for="instagram_url" class="col-md-4 col-form-label text-md-right">Instagrami aadress</label>
    <div class="col-md-6">
        {!! Form::text('instagram_url', null, ['placeholder'=>'https://instagram.com/', 'class' => 'form-control', 'id' => 'address']) !!}
    </div>
</div>


<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Logo</label>
    <div class="col-md-6">
        {!! Form::file('brand_logo', ['id' => 'imgupload'] ) !!}

    </div>
</div>


<div class="form-group row">
    <div class="col-12">
        <div id="map" style="height: 200px;"></div>
    </div>
</div>

<hr>

<style>
    .checkbox-styled {
        transform: scale(1.5);
        margin-top: 10px;
    }

    .disableField {
        background-color: gray;
    }

    .openingtimes-table tr td {
        padding: 5px 10px;
    }
</style>


<div class="form-group row">

    <div class="col-md-4">
        <h2>Avatud</h2>
    </div>

</div>


<table border=0 cellpadding=0 cellspacing=0 width=100% class="openingtimes-table">
    <tr>
        <td>
        </td>
        <td>
            Alates
        </td>
        <td>
            Kuni
        </td>
        <td>
            Töökoda avatud vaid kokkuleppel
        </td>
    </tr>

    @foreach(\App\Enums\DayOfWeekEnum::choices() as $value => $name)
        <tr>
            <input type="hidden" name="timeslots[{{ $value }}][day_of_week]" value="{{ $value }}">
            <td> {{ $name }} </td>
            <td>
                <select name="timeslots[{{ $value }}][from]" class="form-control">
                    @foreach($times as $time)
                        <option {{ selected($time === '08:00') }}>{{ $time }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="timeslots[{{ $value }}][to]" class="form-control">
                    @foreach($times as $time)
                        <option {{ selected($time === '17:30') }} value="{{ $time }}">{{ $time }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="timeslots[{{ $value }}][open_type]" class="form-control">
                    @foreach(\App\Enums\OpenTypeEnum::choices() as $value => $type)
                        <option value="{{ $value }}">{{ $type }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    @endforeach

</table>


<button type="submit" name="button" class="btn btn-success">Sisesta</button>


<script>
    $('input:checkbox').change(function () {
        if ($(this).is(":checked")) {

            $(this).closest("tr").find(".form-control").addClass("disableField");


        } else {
            $(this).closest("tr").find(".form-control").removeClass("disableField");
        }
    });
</script>


@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key={{ config('services.google.key') }}&sensor=false&callback=initMap"
            async defer>
    </script>
@endpush
