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


.mybtn {
    text-align: left;
    width: 100%;
    padding: 5px;
    padding-left: 10px;
    margin-right: 0;
}

.pricerequest-table tr td {
    padding-top: 5px;
    padding-bottom: 5px;
    padding-right: 0;
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
                        <a href="{{ url('/admin/reviews') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-star"></i>
                                <p>Arvustused</p>
                            </div>
                        </div>
                        </a>
                    </div>


                    <div class="col-md-4 js-tilt mb-20">
                        <a href="{{ url('/admin/company-data') }}">
                        <div class="admin-menu-box">
                            <div class="admin-menu-box-content">
                                <i class="fas fa-user"></i>
                                <p>Konto seaded</p>
                            </div>
                        </div>
                        </a>
                    </div>




</div>




<div class="row" style="margin-top: 30px;">
    <div class="col-md-12"> 
        <h3 style="margin-bottom: 0;">Saabunud päringud</h3><p style="margin-top: 0; color: #a9a9a9;">Näitab viimase 14 päeva päringuid</p> <?php echo $pricerequests->links(); ?>

        <hr>
        <table class="pricerequest-table" style="width: 100%;">
            <tr style="font-weight: 700;">
                <td>Auto</td>
                <td>Mootor</td>
                <td>Piirkond</td>
                <td>Kuupäev</td>
                <td>Pakkumine</td>
            </tr>



            @if(empty($lines))
            <tr style="font-weight: 700; font-size: 15px;">
                <td colspan="5">
                  <i class="fas fa-info-circle" style="color: green;"> </i> Hetkel päringuid saadetud pole
                 </td>
            </tr>
            @else
            {!! $lines !!} 
            @endif


        </table>

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
