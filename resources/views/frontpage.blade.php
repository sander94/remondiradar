@extends('layouts.main')
@section('content')

<div class="content finder">

	<div class="row">



		
		
		@foreach($workrooms as $workroom)
	
			<div class="col-12 col-sm-12 col-md-12 col-lg-6 wr-card-container js-tilt">
			
				<a href="/show/{{ $workroom->id }}">
				
					<div class="wr-card">

						<div class="blue-line"> </div>

						<div class="row headline-logo">

							<div class="col-8">

								<h3>{{ $workroom->brand_name }}</h3>

								<p>{{ $workroom->short_description }}</p>

							</div>

							<div class="col-4">

								<img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="wr-logo">

							</div>

						</div>

						<div class="row dashed-top">

							<div class="col-6">

								<div class="info-row"><i class="fas fa-map-marker-alt fa-fw"> </i> {{ $workroom->full_address }}</div>

								<div class="info-row"><i class="fas fa-phone fa-flip-horizontal fa-fw"> </i> {{ $workroom->phone }}</div>

							</div>

							<div class="col-6">

								  <div class="rating-stars">

					                  <i class="fas fa-star"> </i>
					                  <i class="fas fa-star"> </i>
					                  <i class="fas fa-star"> </i>
					                  <i class="fas fa-star"> </i>
					                  <i class="fas fa-star"> </i>

					              </div>

							</div>

						</div>

					</div>
				
				</a>
			
			</div>

		@endforeach

			


	



	</div>

</div>




@endsection