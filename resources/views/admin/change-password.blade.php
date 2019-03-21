@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(session('errorMsg'))

                    <div class="alert alert-icon alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="mdi mdi-check-all"></i>
                            <strong>Viga!</strong> {{ session('errorMsg') }}
                    </div>
                  @endif
            <div class="card">
                <div class="card-header">Parooli vahetamine</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatePassword') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">Vana parool</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" value="{{ old('oldpassword') }}" required autofocus>

                                @if ($errors->has('old-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Uus parool') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Uus parool teist korda') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Vaheta parool') }}
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
