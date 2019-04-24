@extends('layouts.main')

@section('content')
<style>
.star-rating {
  font-family: 'Font Awesome 5 Free';
  margin-bottom: 8px;
}
.star-rating > fieldset {
  border: none;
  display: inline-block;
}
.star-rating > fieldset:not(:checked) > input {
  position: absolute;
  top: -9999px;
  clip: rect(0, 0, 0, 0);
}
.star-rating > fieldset:not(:checked) > label {
  float: right;
  width: 50px;
  padding: 0 0.05em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 40px;
  color: orange;
}
.star-rating > fieldset:not(:checked) > label:before {
  content: '\f005  '; font-weight: 400;
}
.star-rating > fieldset:not(:checked) > label:hover,
.star-rating > fieldset:not(:checked) > label:hover ~ label {
  color: orange;
  font-weight: 900;
}
.star-rating > fieldset:not(:checked) > label:hover:before,
.star-rating > fieldset:not(:checked) > label:hover ~ label:before {
  content: '\f005  '; font-weight: 900;
}
.star-rating > fieldset > input:checked ~ label:before {
  content: '\f005  '; font-weight: 900;
}
.star-rating > fieldset > label:active {
  position: relative;
  top: 2px;
}

input::placeholder {
color: #bbb !important;
}

#custom-feedback {
	display: none;
}
</style>

<div class="content pricerequest">
	<div class="content-box">
		<div class="row">
			<div class="col-md-12">

				@if(!empty($review))

							<h1 class="heading" style="margin-bottom: 0px;"><strong>Saada töökojale tagasiside</strong></h1>
							<p style="margin-top: 0px;">NB! Hinnang on avalik koos sisestatud nime ja kommentaariga </p>
							<style>
							p strong { font-weight: 700; }
							</style>

							<div class="row">

								<div class="col-md-4 offset-md-4">
									<form action="" method=post autocomplete="off" class="needs-validation" autofill="false" novalidate>
										@csrf

										
										<div class="star-rating">

										  <fieldset>
										    <input type="radio" id="star5" name="stars" value="5" required /><label for="star5" title="Outstanding">5 stars</label>
										    <input type="radio" id="star4" name="stars" value="4" /><label for="star4" title="Very Good">4 stars</label>
										    <input type="radio" id="star3" name="stars" value="3" /><label for="star3" title="Good">3 stars</label>
										    <input type="radio" id="star2" name="stars" value="2" /><label for="star2" title="Poor">2 stars</label>
										    <input type="radio" id="star1" name="stars" value="1" /><label for="star1" title="Very Poor">1 star</label>
										    <div id="custom-feedback"><p style="font-family: 'Nunito'; color: red; font-weight: 700;">Vali hinnangu tärn</p></div>
										  </fieldset>
										 
										</div>



										<p style="margin-bottom: 8px; padding-bottom: 0px;"><strong>KOMMENTAAR</strong></p>

										<textarea name="comment" class="form-control" style="height: 100px;"></textarea><br>

										<p style="margin-bottom: 8px; padding-bottom: 0px;"><strong>SINU NIMI</strong></p>

										<input type="text" name="name" class="form-control" placeholder="Avalik, täitmine pole kohustuslik" style="margin-bottom: 30px;">


										
										<button type="submit" class="btn btn-primary btn-block">Saada tagasiside</button>
									</form>
								</div>
							</div>





				@else

				<strong>Vale tagasiside link või oled juba vastuse andnud</strong>

				@endif


			</div>



		</div>
















	</div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          $('#custom-feedback').show();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

@endsection