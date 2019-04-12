@extends('layouts.main')

@section('content')

<div class="content">
	<div class="content-box">

	@if(session()->has('message'))
		<div class="alert alert-success">Andmed saadetud!</div>
	@endif
	<h2 style="margin-bottom: 0px;">Saada hinnapäring töökodadele</h2>
	<p>Kohalikud remonditöökojad vaatavad selle üle ning saadavad sinu e-mailile vastused!</p>
	<div style="height: 50px;"></div>
	<form action="{{ url('/hinnaparing') }}" method="post" class="needs-validation" autocomplete="off" autofill="false" novalidate>
		@csrf
<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<strong>1) Auto andmed</strong>
				</div>
				<div class="card-body">


					<div class="form-group">
						<div class="row">
							<div class="col-6">
							    <label for="make">Mark:</label>
							    <input type="text" class="form-control" id="make" name="make" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
							<div class="col-6">
							    <label for="model">Mudel:</label>
							    <input type="text" class="form-control" id="model" name="model" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
				 	 </div>

					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-12">
							    <label for="year">Väljalaskeaasta:</label>
							    <input type="text" class="form-control" name="year" id="year" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>

					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-6">
							    <label for="engine">Mootori maht:</label>
							    <input type="text" class="form-control" id="engine" name="engine" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
							<div class="col-6">
							    <label for="kw">Võimsus kW:</label>
							    <input type="text" class="form-control" id="kw" name="kw" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>

					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-12">
							    <label for="gearbox">Käigukast:</label>
							    <select class="form-control" id="gearbox" name="gearbox" required>
							    	<option>Manuaal</option>
							    	<option>Automaat</option>
							    	<option>Poolautomaat</option>
							    </select>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>

					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-12">
							    <label for="fuel">Kütus:</label>
							    <select class="form-control" id="fuel" name="fuel" required>
							    	<option>Bensiin</option>
							    	<option>Diisel</option>
							    	<option>Hübriid</option>
							    	<option>Elekter</option>
							    </select>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>

					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-12">
							    <label for="additional_info">Probleemi kirjeldus:</label>
							    <textarea class="form-control" name="additional_info" id="additional_info" style="height: 150px;" required></textarea>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>

				</div>
			</div>


		</div>




		<div class="col-md-4">

			<div class="card">
				<div class="card-header">
					<strong>2) Kontaktandmed</strong>
				</div>
				<div class="card-body">



					<div class="form-group">
						<div class="row">
							<div class="col-12">
							    <label for="name">Nimi:</label>
							    <input type="text" class="form-control" id="name" name="name">
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
				 	 </div>

					<div class="form-group">
						<div class="row">
							<div class="col-12">
							    <label for="email">E-maili aadress:</label>
							    <input type="email" class="form-control" id="email" name="email" required>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
				 	 </div>


					<div class="form-group">
						<div class="row">
							<div class="col-12">
							    <label for="phone">Telefon:</label>
							    <input type="text" class="form-control" id="phone" name="phone">
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
				 	 </div>


					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-12">
							    <label for="region">Piirkond:</label>
							    <select class="form-control" id="region" name="region" required>
							    	<option value="">Vali töökoja piirkond</option>
							    	<option value="1">Pärnu</option>
							    	<option value="2">Tallinn</option>
							    	<option value="3">Tartu</option>
							    </select>
							    <div class="invalid-feedback">Nõutud väli.</div>
							</div>
						</div>
					  </div>


					  <div class="form-group form-check">
					    <label class="form-check-label">
					      <input class="form-check-input" type="checkbox" name="remember" required> Nõustun, et esitatud andmed edastatakse töökodadele.
					      <div class="invalid-feedback">Päringu saatmiseks pead nõustuma tingimustega.</div>
					    </label>
					  </div>

<br>
				 	 <button type="submit" class="btn btn-primary">Küsi hinda</button>



				</div>
			</div>
		</div>
	</div>
	</form>










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
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



@endsection