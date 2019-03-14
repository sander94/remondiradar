@extends('layouts.app')

@section('content')

@guest
Töökoja vaatamiseks pead olema sisse logitud.
@else
<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $workroom->brand_name }}</h2>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p> {{ $message }} </p>
                        </div>
                    @endif
                
                <hr>
                   
             @if(count($errors) > 0)
             	@foreach ($errors->all() as $error)
             		{{ $error }}
             	@endforeach
             @endif




                    
                </div>
            </div>
        </div>
    </div>
</div>
@endguest

@endsection