@extends('layouts.main')

@section('content')

<div class="content pricerequest">
	<div class="content-box">
		<div class="row">
			<div class="col-md-5">
				<h1 class="heading" style="margin-bottom: 10px;"><strong>Mis on Remondiradar?</strong></h1>
				<style>
				p strong { font-weight: 700; }
				</style>
				<p style="font-size: 18px;">
			
					
					Remondiradar on autoremonditöökodade <strong>turundus- ja halduskanal,</strong>
					mis võimaldab platvormi külastajatel <strong>kiirelt</strong> leida sobilik remonditöökoda.
					<br><br>
					Ühtlasi on meie missiooniks tuua kogu ettevõttes toimuva haldamine ühte kohta - alustades info haldamisest, lõpetades broneeringusüsteemi ning arvete genereerimisega.
					<br><br>
					Keskkond on pidevalt arenemas ning põnevaid uuendusi on alati oodata!
					

				
				
				
				</p>
				<div style="height: 100px;"></div>
			</div>

			<div class="col-md-7">

				<div style="height: 270px; width: 100%; background-color: orange;"><img src="{{ url('images/web/about_us.jpg') }}" style="width: 100%;"></div>

			</div>


		</div>


<style type="text/css">
	.explainerBox {
		border: 1px solid #e6e6e6;
		padding-left: 25px;
		padding-right: 25px;
		padding: 25px;
		min-height: 250px;
		background-color: #72cbff;
	} 

	.explainerBox-white {
		background-color: #FFFFFF;
	}

	.explainerBox p {
		font-size: 20px;
		color: black;
	}

	.explainerBox h4 {
		margin-bottom: 30px;
	}

	.explainerBox h4 {
		font-size: 24px;
	}

	@media screen and (max-width: 1300px) {
		.explainerBox {
			height: 350px;
		}
		.explainerBox h4 {
			font-size: 16px;
		}
	}

		@media screen and (max-width: 790px) {
		.explainerBox {
			height: 450px;
		}
	}

		@media screen and (max-width: 767px) {
		.explainerBox {
			height: auto;
			min-height: auto;
		}
	}
</style>




		<div class="row" style="margin-top: 50px;">

			<div class="col-md-12">
				<h2 class="text-center" style="font-weight: 700;">Omad töökoda? <a href="{{ url('register') }}" style="color: #175df6;">Liitu tasuta!</a></h2>
					
					<div class="row" style="margin-top: 50px;">

						<div class="col-md-4 text-center">
							<div class="explainerBox">
								<h4 style="color: orange; font-weight: 700; color: #FFFFFF;">TÖÖKOJA HALDUS</h4>
								<p>Kui Sul on mitu töökoda, saad neid kõiki hallata ühelt kontolt. Töökodasid saab lisada piiramatul hulgal. Ei mingeid lisatasusid.</p>
							</div>
						</div>

						<div class="col-md-4 text-center">
							<div class="explainerBox">
								<h4 style="color: orange; font-weight: 700; color: #FFFFFF;">HINNAPÄRINGUD</h4>
								<p>Teenuse otsija saab ühe sisestamisega saata hinnapäringu kõigile kohalikele töökodadele. Saabunud päringud on nähtavad
								Sinu ettevõtte halduskontol, kus saad teha hinnapakkumise ja pakkuda esimese vaba aja oma töökotta.</p>
							</div>
						</div>


						<div class="col-md-4 text-center">
							<div class="explainerBox">
								<h4 style="color: orange; font-weight: 700; color: #FFFFFF;">TÖÖKOJA VISIITKAART</h4>
								<p>Igal töökojal on oma visiitkaart - leht, kus kogu info koos asukohakaardiga on esinduslikult välja toodud. Kuna üle poolte teenuseotsijate kasutab mobiilseadmeid, on väga oluline omada kaunist mobiilisõbralikku lehte.</p>
							</div>
						</div>


					</div>




			</div>

		</div>





<div style="height: 100px;"> </div>


		<div class="row">

			<div class="col-md-12">
				<h2 class="text-center" style="font-weight: 700;">On, mida oodata...</h2>
					
					<div class="row" style="margin-top: 50px;">

						<div class="col-md-4 text-center">
							<div class="explainerBox explainerBox-white">
								<h4 style="color: orange; font-weight: 700;">ARVETE GENEREERIMINE</h4>
								<p>Võimalus genereerida PDF arveid ning saata need otse kliendile. Kõik arved talletatakse meie andmebaasis - hiljem saate sorteerida ja näha kõiki saadetud arveid </p>
							</div>
						</div>

						<div class="col-md-4 text-center">
							<div class="explainerBox explainerBox-white">
								<h4 style="color: orange; font-weight: 700;">LIVE-CHAT</h4>
								<p>Kasutaja, kes vaatab teie töökoja lehte, saab otse vestelda teie konto haldajaga. Live-chat toimub läbi haldusliidese.</p>
							</div>
						</div>


						<div class="col-md-4 text-center">
							<div class="explainerBox explainerBox-white">
								<h4 style="color: orange; font-weight: 700;">TAGASISIDE</h4>
								<p>Läbi halduskonto on igale kliendile võimalik saata tagasiside vorm, kus antakse hinnang ja kommentaar teenuse kvaliteedile. Kõrgem reiting tagab suurema huvi töökoja vastu.</p>
							</div>
						</div>


					</div>




			</div>

		</div>







	</div>
</div>

@endsection