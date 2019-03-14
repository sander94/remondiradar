@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ Auth::user()->name }} </b> <a href="/admin/company-data" style="float:right;"><i class="fa fa-pencil"> </i> Ettevõtte andmed</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        


                        @if(count($workrooms) > 0)
                        <a href="/admin/workrooms">Minu töökojad</a>
                        @else
                        <p> <a href="{{ route('workrooms.create') }}" class="btn btn-xs btn-success">Lisa esimene töökoda</a> </p>
                        @endif


                       
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
