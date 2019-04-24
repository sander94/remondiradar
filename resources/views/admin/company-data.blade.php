@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b> {{ Auth::user()->name }} </b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    
                        <form method="POST" action="{{ route('company-data') }}" autocomplete="off">
                        @csrf


                        <div class="form-group row">
                            <div class="col-md-5">
                                Saada e-mailile teavitus, kui minu töökoja piirkonda saadetakse hinnapäring.
                            </div>
                            <div class="col-md-7">
                                <select name="pricerequest_email_to_user" class="form-control">
                                    <option value="0">Ei</option>
                                    <option value="1" @if(Auth::user()->pricerequest_email_to_user == '1') selected @endif>Jah</option>
                                </select>
                            </div>
                        </div>

                        <hr style="margin-top: 20px; margin-bottom: 20px;">

                        <div class="form-group row">
                            <div class="col-md-5">
                                Parooli seaded
                            </div>
                            <div class="col-md-7">
                                <a href="{{ url('admin/change-password') }}">Vaheta konto parool</a>
                            </div>
                        </div>
                        
                        <hr style="margin-top: 20px; margin-bottom: 20px;">
                        <div class="form-group row">
                            <div class="col-md-5">
                            	Ettevõtte registrikood
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="reg_no" value="{{ Auth::user()->reg_no }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                Juriidiline aadress
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="legal_address" value="{{ Auth::user()->legal_address }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                            	Peamine kontakttelefon
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-5">
                            	Koduleht
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="website" value="{{ Auth::user()->website }}">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="float: right;">
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