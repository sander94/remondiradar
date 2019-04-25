@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Arvustused</h2>
                </div>
                <div class="card-body">
              @if(Session::has('successMsg'))
                <div class="alert alert-success"> <p> {{ Session::get('successMsg') }} </p> </div>
              @endif
              <br>
                	<form action="" method=post>
                		@csrf


                		<div class="row">
                			<div class="col-8">
                				<p style="">Küsi oma kliendilt hinnang teenuse kohta. Sisesta e-mail ning vali töökoda, millele tagasisidet soovid. Klient saab e-mailile lingi, millele vajutades avaneb tagasiside vorm. Kogu tagasiside kajastub töökoja lehel ning siin keskkonnas.</p>
                			</div>
                		</div>



                		<table cellpadding="0" cellspacing="0" width=100%>


                			<tr>
                				<td style="padding: 0px 10px;">
                					<strong>Kliendi e-mail</strong>
                          		</td>
                          		<td style="padding: 0px 10px;">
									<strong>Töökoda</strong>
                          		</td>
                          		<td style="padding: 0px 10px;">
                               	</td>
                            </tr>


                			<tr>
                				<td style="padding: 0px 10px;">
                          		      <input type="text" name="reviewer_email" class="form-control">
                          		</td>
                          		<td style="padding: 0px 10px;">
                          			<select name="wr_id" class="form-control">
                          				@foreach($workrooms as $wr)
                          					<option value="{{ $wr->id }}">{{ $wr->brand_name }}</option>
                          				@endforeach
                          			</select>
                          		</td>
                          		<td style="padding: 0px 10px;">
                               		 <button type="submit" class="btn btn-primary">Küsi tagasisidet</button>
                               	</td>
                            </tr>




                		</table>



                    </form>

                
<!--


                    <div class="form-group row">
                      <div class="col-md-12">

                        <table border=0 cellpadding=0 cellspacing=0>

                          <tr>
                            <td>
                              Nimi
                            </td>
                            <td>
                              Kommentaar
                            </td>
                            <td>
                              Hinnang
                            </td>
                          </tr>


                      </div>
                    </div>


-->





                    
                </div>
            </div>
        </div>
    </div>
</div>





@endsection