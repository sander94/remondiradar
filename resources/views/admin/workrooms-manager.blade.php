@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Minu töökojad</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                    <br>
                    @if (!$hasWorkrooms)
                     <h3>  Lisa esimene töökoda </h3>
                    @endif
                        <form method="POST" action="{{ route('my-workrooms') }}" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                            	Registrikood
                                <input type="text" class="form-control" name="reg_no" value="{{ Auth::user()->reg_no }}" autofocus>
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