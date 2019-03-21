@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <?php /* SUCESS MESSAGE OF PASSWORD CHANGE */ ?>

                @if(session('successMsg'))

                    <div class="alert alert-icon alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="mdi mdi-check-all"></i>
                            <strong>Tehtud!</strong> {{ session('successMsg') }}
                    </div>
                  @endif





            <div class="card">
                <div class="card-header"><b>{{ Auth::user()->name }} </b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        
<style>
    .admin-menu-box {
        width: 100%;
        height: 170px;
        background-color: #8bc0e6;
        color: #FFFFFF;
        text-align: center;
        transition: background-color 0.1s ease-in;
    }

    .admin-menu-box-content {
          position: absolute;
          top: 52%;
          transform: translateY(-48%);
          left: 0;
          right: 0;
    } 

    .admin-menu-box-content i.fas {
        font-size: 60px;
        line-height: 80px;
        margin-bottom: 5px;
    }

    .admin-menu-box-content p {
        font-size: 20px;
        font-weight: 500;
    }

    .admin-menu-box:hover {
        background-color: #3eb54d;
    }

    .mb-20 {
        margin-bottom: 20px;
    }
</style>

<div class="row">

            @if(count($workrooms) > 0)
                    <div class="col-md-4 js-tilt mb-20">
                        <a href="{{ url('/admin/workrooms') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-car"></i>
                                <p>Minu töökojad</p>
                            </div>
                        </div>
                        </a>
                    </div>
            @else
                    <div class="col-md-4 js-tilt mb-20">
                        <a href="{{ url('/admin/workrooms/create') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-plus"></i>
                                <p>Lisa töökoda</p>
                            </div>
                        </div>
                        </a>
                    </div>

            @endif


                    <div class="col-md-4 js-tilt mb-20">
                        <a href="{{ url('/admin/company-data') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-user"></i>
                                <p>Ettevõtte andmed</p>
                            </div>
                        </div>
                        </a>
                    </div>



                    <div class="col-md-4 js-tilt">
                        <a href="{{ url('/admin/change-password') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-key"></i>
                                <p>Vaheta parooli</p>
                            </div>
                        </div>
                        </a>
                    </div>
</div>



                       
                        

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/tilt.js@1.1.21/dest/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
    scale: 1.1,
    maxTilt: 8,
    
})
</script>
@endsection
