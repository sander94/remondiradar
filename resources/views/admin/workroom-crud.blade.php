@extends('layouts.app')

@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css'>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Töökoda</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                    <br>
                    
                        <form method="POST" enctype="multipart/form-data" action="{{ route('workroom.update', ['id' => $currentWorkroom->id]) }}" autocomplete="off">
                        @csrf

                       	<h2>Töökoda</h2>
                        <div class="form-group row">
                            <div class="col-md-6">
                            	Bränd, töökoja nimetus
                                <input type="text" class="form-control" name="brand_name" value="{{ $currentWorkroom->brand_name }}" autofocus>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6">
                            	Brändi logo
                               <input type="file" class="form-control" name="brand_logo">
                            </div>
                        </div>



						 <div class="form-group row">
                            <div class="col-md-6">
                            	Kuulub piirkonda
									 <select name="region" placeholder="Vali piirkond..." id="search">
										 <option value=""></option>
									    <option value="1">Pärnu maakond</option>
									    <option value="2">Pärnu linn</option>
									    <option value="3">Harjumaa</option>
									  </select>
		                                <script>
			                             	$(document).ready(function(){
											  $('#search').selectize();
											});   
										</script>
                            </div>
                        </div>




                        <br><br>
                        <h2>Kontaktandmed</h2>

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Töökoja aadress
                                <input type="text" name="email" class="form-control" value="{{ $currentWorkroom->full_address }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Töökoja kontakttelefon
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                            	Töökoja e-mail päringute saamiseks
								<input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
	                      	 </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Töökoja kodulehe aadress
								<input type="text" name="website_url" class="form-control" value="{{ Auth::user()->website }}">
	                      	 </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Instagram
								<input type="text" name="instagram_url" class="form-control" value="{{ $currentWorkroom->instagram_url }}">
	                      	 </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                            	Facebook
								<input type="text" name="facebook_url" class="form-control" value="{{ $currentWorkroom->facebook_url }}">
	                      	 </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Lisainfo, müügitekst
                                <textarea name="additional_info" class="form-control">{{ $currentWorkroom->additional_info }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Uuenda andmeid') }}
                                </button>
                            </div>
                        </div>





                    </form>
           

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
