@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Uuenda töökoda {{ $workroom->brand_name }}</h2>
                
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p> {{ $message }} </p>
                        </div>
                    @endif
                
                
                   
             @if(count($errors) > 0)
             	@foreach ($errors->all() as $error)
             		{{ $error }}
             	@endforeach
             @endif


             {!! Form::model($workroom, ['method' => 'PATCH', 'route' => ['workrooms.update', $workroom->id], 'enctype' => 'multipart/form-data']) !!}
             @include ('admin.workrooms.editform')
             {!! Form::close() !!}

                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection