<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css'>

<div class="form-group row">
	<label for="is_active" class="col-md-4 col-form-label text-md-right">Avalikusta kohe</label>
		<div class="col-md-6">
			{!! Form::checkbox('is_active', 1, true) !!}
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
			@include ('includes.selectLocation', ['region' => '0'])
		</div>
</div>


<div class="form-group row">
	<label for="region" class="col-md-4 col-form-label text-md-right">Google Maps - vali täpne asukoht rippmenüüst</label>
		<div class="col-md-6">
			{!!  Form::text('google_maps', null, ['placeholder' => 'Google aadress', 'class' => 'form-control', 'id' => 'googleInput']) !!}
			</script>
		</div>
</div>

<script>
function initialize() {

var input = document.getElementById('googleInput');
var autocomplete = new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key=AIzaSyCFGE2zSlkuGfx9Vg_71R2BQYP54I0OuDM&sensor=false&callback=initialize" async defer>
    </script>


<div class="form-group row">
	<label for="short_description" class="col-md-4 col-form-label text-md-right">Lühitutvustus<br>
		<span class="char-count">150</span> tähte</label>
		<div class="col-md-6">
		{!! Form::textarea('short_description', null, ['placeholder'=>'Müügitekst', 'class' => 'form-control char-textarea', 'data-length' => '150', 'id' => 'short_description', 'style' => 'height: 100px']) !!}



		<script>
			$(".char-textarea").on("keydown",function(event){
  checkTextAreaMaxLength(this,event);
});

/*
Checks the MaxLength of the Textarea
-----------------------------------------------------
@prerequisite:	textBox = textarea dom element
				e = textarea event
                length = Max length of characters
*/
function checkTextAreaMaxLength(textBox, e) { 
    
    var maxLength = parseInt($(textBox).data("length"));
    
  
    if (!checkSpecialKeys(e)) { 
        if (textBox.value.length > maxLength - 1) textBox.value = textBox.value.substring(0, maxLength); 
   } 
  $(".char-count").html(maxLength - textBox.value.length);
    
    return true; 
} 
/*
Checks if the keyCode pressed is inside special chars
-------------------------------------------------------
@prerequisite:	e = e.keyCode object for the key pressed
*/
function checkSpecialKeys(e) { 
    if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40) 
        return false; 
    else 
        return true; 
}
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
	<label class="col-md-4 col-form-label text-md-right">Logo</label>
		<div class="col-md-6">
		{!! Form::file('brand_logo', ['id' => 'imgupload'] ) !!}

		</div>
</div>












	<button type="submit" name="button" class="btn btn-success">Sisesta</button>




