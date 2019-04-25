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

								<p>{{ substr($workroom->short_description, 0, 160) }}</p>

	
							</div>

							<div class="col-4">
								@if($workroom->brand_logo)
									<img src="{{ asset('images/t_logos/'.$workroom->brand_logo.'') }}" class="wr-logo">
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
							$rating  = 0;
							foreach($workroom->reviews as $review)
							{
								$rating = $rating+$review->stars;
							}

							
							if(count($workroom->reviews) > 0) {
								$avgrating = round($rating/count($workroom->reviews), 2);
								$percentage = ($avgrating/5)*100;
							}
							else {
								$percentage = 0;
							}

							?>	


							<div class="finder-starcontainer">
								  <div class="rating-stars" style="position: relative;">





									    <div class="stars-rating">
									    	<div class="stars-score" style="width: {{ $percentage }}%">
									    		<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
									    	</div>
											<div class="stars-scale">
												<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
											</div>
									    </div>



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