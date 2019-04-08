@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        	<div class="card">

        		<div class="card-header">
        			{{ $pricerequest->make }}
        		</div>


        		<div class="card-body">

        			@if(Session::has('successmsg'))
        				<div class="alert alert-success"> <p> {{ Session::get('successmsg') }} </p> </div>
        			@endif
        			<br>
        			@if(Session::has('mail'))
        				{{ Session::get('mail') }}
        			@endif

        			<div class="row">
						<div class="col-md-4 text-md-right">Auto</div>
							<div class="col-md-6">
								<strong>{{ $pricerequest->make }}</strong> {{ $pricerequest->model }} ({{ $pricerequest->year }} a)
							</div>
					</div>

        			<div class="row">
						<div class="col-md-4 text-md-right">Mootor</div>
							<div class="col-md-6">
								{{ $pricerequest->engine }} - {{ $pricerequest->kw }} kW
							</div>
					</div>

        			<div class="row">
						<div class="col-md-4 text-md-right">Kütus</div>
							<div class="col-md-6">
								{{ $pricerequest->fuel }}
							</div>
					</div>

        			<div class="row">
						<div class="col-md-4 text-md-right">Käigukast</div>
							<div class="col-md-6">
								{{ $pricerequest->gearbox }}
							</div>
					</div>

        			<div class="row" style="margin-top: 20px;">
						<div class="col-md-4 text-md-right">Probleem</div>
							<div class="col-md-6">
								{{ $pricerequest->additional_info }}
							</div>
					</div>

        			<div class="row" style="margin-top: 10px;">
						<div class="col-md-4 text-md-right">Kontakt</div>
							<div class="col-md-6">
								{{ $pricerequest->email }}; {{ $pricerequest->phone }}
							</div>
					</div>

					<hr>
					@if($companyHasAnswered)
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-4 text-md-right"><strong>Vastatud</strong></div>
							<div class="col-md-6">
									 <?php echo nl2br($pricerequest->answer->answer); ?>
									 <br><br>
									 <i> Saadetud 
									 {{ $pricerequest->answer->created_at->format('d.m.Y') }}
									 kell {{ $pricerequest->answer->created_at->format('H:i') }} </i>
							</div>
					</div>
				
					@else
					<form action="" method="post">
	        			@csrf
	        			<div class="form-group row">
							<div class="col-md-4 text-md-right">Hinnapakkumine</div>
								<div class="col-md-6">
									<textarea class="form-control" name="answer" style="height: 200px;" placeholder="Esita hinnapakkumine. Võimalusel ka esimene vaba aeg töö teostamiseks."></textarea>
								</div>
						</div>

	        			<div class="form-group row">
							<div class="col-md-4 text-md-right"></div>
								<div class="col-md-6">
									<button class="form-control btn btn-success" type="submit">Saada pakkumine</button>
								</div>
						</div>


					</form>
					@endif
				
        		</div>

        	</div>

        </div>
    </div>
</div>




@endsection