@extends('layouts.main')

@section('content')

<div class="content meist">
	<div class="content-box">
		<div class="row">
			<div class="col-md-5">
				<h1 class="heading" style="margin-bottom: 20px;"><strong>Mis on Remondiradar?</strong></h1>
				<style>
				p strong { font-weight: 700; }
				</style>
				<p style="font-size: 18px;">
			
					<!-- Kui auto vajab ootamatult remonti ja asjaga on kiire, tuleb probleem esimesel võimalusel lahendada. Läbi Remondiradari on võimalik ühe päringuga saada kohalikelt remonditöökodadelt infot lähima vaba aja ja tööde hinna kohta.
					-->



					Remondiradar on autoremonditöökodade <strong>turundus- ja halduskanal,</strong>
					mis võimaldab platvormi külastajatel <strong>kiirelt</strong> leida sobilik remonditöökoda.
					<br><br>
					Ühtlasi on meie missiooniks tuua kogu remondiettevõttes toimuva haldamine ühte kohta.
					<br>
					Keskkond on pidevalt arenemas ning põnevaid uuendusi on alati oodata!
					<br><br>
					<a href="{{ url('register') }}" class="register-now-button"><i class="fas fa-plus fa-fw" style="font-size: 14px;"></i> Registreeri ja lisa töökoda!</a>
					

				
				
				
				</p>
				<div style="height: 50px;"></div>
			</div>

			<div class="col-md-7">

				<div style="width: 100%; background-color: orange;"><img src="{{ url('images/web/about_us.jpg') }}" style="width: 100%;"></div>

			</div>


		</div>


<style type="text/css">
	.explainerBox {
		border-left: 0px solid #000000;
		background-color: #FFFFFF;
		margin-top: 20px;
	} 

	.explainerBox-white {
		background-color: #000000;
		border: 0;
	}

	.explainerBox p {
		font-size: 20px;
		color: black;
	}

	.explainerBox h4 {
		margin-bottom: 30px;
		padding-left: 10px;
	}

	@media screen and (max-width: 1300px) {
		.explainerBox {
		}
		.explainerBox h4 {
			font-size: 16px;
		}
	}

		@media screen and (max-width: 790px) {
		.explainerBox {
		}
	}

		@media screen and (max-width: 767px) {
		.explainerBox {
			height: auto;
			min-height: auto;
		}
		
		.explainerBox h4 {
			font-size: 20px;
		}
		
		span.liitu { display: block; }
	}
	

</style>




		<div class="row" style="margin-top: 50px;">

			<div class="col-md-12">
				<h1 class="text-center">Põhjused, miks Remondiradarit kasutab</h1><h1 class="text-center" style="font-weight: 900;">üle 100 ettevõtte Eestis<!--<a href="{{ url('register') }}" style="color: #175df6;"><span class="liitu">Registreeri ettevõte ja lisa töökoda siin!</span></a>--></h1>
					
					<div class="row mb-60" style="margin-top: 80px;">

						<div class="col-md-6">
							<div class="explainerBox">
								<h4 style="font-weight: 700;"><span class="blue-line"></span>HINNAPÄRINGUD</h4>
								<p>Teenuse otsija saab ühe sisestamisega saata hinnapäringu kõigile kohalikele töökodadele. Saabunud päringud on nähtavad
								Sinu ettevõtte halduskontol, kus saad teha hinnapakkumise ja pakkuda esimese vaba aja oma töökotta.</p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="explainerBox">
								<h4 style="font-weight: 700;"><span class="blue-line"></span>TAGASISIDE KLIENTIDELT</h4>
								<p>Paari klikiga on võimalik klientidelt küsida tagasisidet teeninduse kohta. Kliendid hindavad oma kogemust 5-tärni süsteemis ning saavad lisada ka kommentaari. Kõrgema hinnanguga töökojad tõstetakse Remondiradari lehel ette.</p>
							</div>
						</div>

					</div>

					<div class="row mb-60">
						<div class="col-md-6">
							<div class="explainerBox">
								<h4 style="font-weight: 700;"><span class="blue-line"></span>TÖÖKOJA HALDUS</h4>
								<p>Kui Sul on mitu töökoda, saad neid kõiki hallata ühelt kontolt. Töökodasid saab lisada piiramatul hulgal. Ei mingeid lisatasusid.</p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="explainerBox">
								<h4 style="font-weight: 700;"><span class="blue-line"></span>TÖÖKOJA VISIITKAART</h4>
								<p>Igal töökojal on oma visiitkaart - leht, kus kogu info koos asukohakaardiga on esinduslikult välja toodud. Kuna üle poolte teenuseotsijate kasutab mobiilseadmeid, on väga oluline omada kaunist mobiilisõbralikku lehte.</p>
							</div>
						</div>


					</div>




			</div>

		</div>





<div style="height: 40px;"> </div>

		<div class="row">

			<div class="col-md-12 text-center">

			<h2 style="color: #175df6; font-weight: 700; margin-bottom: 50px;">
				<a href="{{ url('register') }}">Registreeri ja liitu tasuta!</a>
			</h2>

			</div>


		</div>

<!--

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

-->





	</div>
</div>

@endsection