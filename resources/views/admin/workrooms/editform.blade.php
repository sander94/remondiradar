<div class="form-group row">
	<label for="is_active" class="col-md-4 col-form-label text-md-right">Avalikustatud</label>
		<div class="col-md-6">
			{!! Form::hidden('is_active',0) !!}
			{!! Form::checkbox('is_active', 1) !!}
		</div>
</div>


<div class="form-group row">
	<label class="col-md-4 col-form-label text-md-right">Logo</label>
		<div class="col-md-6">
		{!! Form::file('brand_logo', ['id' => 'imgupload'] ) !!}

		<label for="imgupload"><img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" width=200></label>
		</div>
</div>

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
					<option value="{{ $region->id }}" @if($workroom->region == $region->id) selected @endif  >{{ $region->region_name }}</option>
				@endforeach
			</select>
		</div>
</div>




<div class="form-group row">
	<label for="short_description" class="col-md-4 col-form-label text-md-right">Lühitutvustus<br>
		<span id="chars">150</span> tähte</label>
		<div class="col-md-6">
		{!! Form::textarea('short_description', null, ['placeholder'=>'Müügitekst', 'class' => 'form-control char-textarea', 'maxlength' => '150', 'id' => 'short_description', 'style' => 'height: 100px']) !!}



<script>
var maxLength = 150;
$('#short_description').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars').text(length);
});
</script>



		</div>
</div>

<div class="form-group row">
	<label for="additional_info" class="col-md-4 col-form-label text-md-right">Pikem kirjeldus - hinnakiri, teenused</label>
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
	<label for="region" class="col-md-4 col-form-label text-md-right">Google Maps - vali täpne asukoht rippmenüüst</label>
		<div class="col-md-6">
			{!!  Form::text('google_maps', null, ['placeholder' => 'Google aadress', 'class' => 'form-control', 'id' => 'googleInput']) !!}
			</script>

    <script>
      var geocoder;
      var map;
      var address = "{{ $workroom->google_maps }}";



      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -34.397, lng: 150.644}
        });
        geocoder = new google.maps.Geocoder();
        codeAddress(geocoder, map);
        var input = document.getElementById('googleInput');
var autocomplete = new google.maps.places.Autocomplete(input);
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
            
          }
        });
      }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key=AIzaSyCFGE2zSlkuGfx9Vg_71R2BQYP54I0OuDM&sensor=false&callback=initMap" async defer>
    </script>



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

	<tr>
		<td> Esmaspäev </td>
		<td>
			<select name="mon_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->mon_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="mon_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->mon_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="mon_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->mon_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->mon_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->mon_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Teisipäev </td>
		<td>
			<select name="tue_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->tue_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="tue_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->tue_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="tue_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->tue_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->tue_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->tue_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Kolmapäev </td>
		<td>
			<select name="wed_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->wed_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="wed_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->wed_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="wed_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->wed_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->wed_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->wed_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Neljapäev </td>
		<td>
			<select name="thu_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->thu_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="thu_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->thu_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="thu_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->thu_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->thu_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->thu_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Reede </td>
		<td>
			<select name="fri_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->fri_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="fri_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->fri_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="fri_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->fri_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->fri_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->fri_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Laupäev </td>
		<td>
			<select name="sat_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->sat_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="sat_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->sat_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="sat_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->sat_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->sat_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->sat_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

	<tr>
		<td> Pühapäev </td>
		<td>
			<select name="sun_from" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->sun_from) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="sun_to" class="form-control">
				@foreach($timeslots as $timeslot)
					<option value="{{ $timeslot->id }}" @if($timeslot->id == $workroom->timeslots->sun_to) selected @endif>{{ $timeslot->time }}</option>
				@endforeach	
			</select>
		</td>
		<td>
			<select name="sun_opt" class="form-control">
				<option value="0" @if($workroom->timeslots->sun_opt == '0') selected @endif>Avatud</option>
				<option value="1" @if($workroom->timeslots->sun_opt == '1') selected @endif>Suletud</option>
				<option value="2" @if($workroom->timeslots->sun_opt == '2') selected @endif>Avatud kokkuleppel</option>
			</select>
		</td>
	</tr>

</table>






	<button type="submit" name="button" class="btn btn-success">Sisesta</button>




