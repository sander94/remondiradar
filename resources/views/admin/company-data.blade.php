@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ettevõtte info</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                    <br>
                     <h1> {{ Auth::user()->name }}</h1>
                    
                        <form method="POST" action="{{ route('company-data') }}" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Registrikood
                                <input type="text" class="form-control" name="reg_no" value="{{ Auth::user()->reg_no }}" autofocus>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6">
                            	Kontakttelefon
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6">
                            	Juriidiline aadress
                                <input type="text" class="form-control" name="legal_address" value="{{ Auth::user()->legal_address }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                            	Koduleht
                                <input type="text" class="form-control" name="website" value="{{ Auth::user()->website }}">
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