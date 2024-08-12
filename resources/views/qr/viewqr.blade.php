<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<style>
.container {
	margin-top: 5vh;
}

.center-container {
    display: flex;
    justify-content: center;
}

.product-info-div {
	display: flex;
	flex-direction: column;
	height: fit-content;
	background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.product-general-info-div {
    display: flex;
    align-items: center;
    max-width: 800px;
	height: fit-content;
    width: 100%;
	gap: 2rem;
}

.product-pic-div {
    flex: 0 0 40%;
    padding: 10px;
}

.product-pic-div img {
    width: 100%;
    height: auto;
    display: block;
}

.product-text-info-div {
    flex: 1;
    padding: 10px;
}

.product-name-div {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 8px;
}

.product-brand-div {
    color: #666;
    margin-bottom: 8px;
}

.product-description-div {
    line-height: 1.5;
    color: #333;
	max-height: 200px;
	overflow-y: auto;
	text-overflow: ellapsis;
	white-space: normal;
}

@media (max-width: 768px) {
	.center-container {
		display: block;
		justify-content: center;
	}
    .product-info-div {
        flex-direction: column;
        text-align: center;
		gap: 1rem;
    }

    .product-pic-div {
        flex: 0 0 auto;
        margin-bottom: 10px;
    }

    .product-text-info-div {
        flex: 1;
        padding: 0;
    }

	.card-body {
		margin-top: 5vh;
	}
}

@media (max-width: 480px) {
    .product-name-div {
        font-size: 1.2em;
    }

    .product-brand-div {
        font-size: 0.9em;
    }

    .product-description-div {
        font-size: 0.9em;
    }
}

.product-final-info-div {
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 2rem;
}

#mapPopup {
	display: none;
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	height: 400px;
	background-color: white;
	border: 1px solid #ccc;
	z-index: 1000;
	padding: 20px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

#map {
	width: 100%;
	height: 70%;
}

#mapPopup button {
	margin-top: 10px;
}

#overlay {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.5);
	z-index: 500;
}

.add-stop-div {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.add-stop-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.add-stop-form {
    display: flex;
    flex-direction: column;
}

.add-stop-form-title {
    font-size: 16px;
    font-weight: 600;
    color: #555;
    margin-bottom: 8px;
}

.add-stop-form-input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    transition: border-color 0.3s ease;
}

.add-stop-form-input:focus {
    border-color: #007bff;
    outline: none;
}

.add-stop-form-button {
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-stop-form-button:hover {
    background-color: #0056b3;
}

.end-button {
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: red;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
	width: 100%;
}

.end-button:hover {
    background-color: #AA0000;
}


</style>

@extends('layouts.app')
@section('content')

<div class="container marketing">
	<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
		<div class="center-container">
			<!-- INFORMACION -->
			<div class="product-info-div">
				<div class="product-general-info-div">
					<div class="product-pic-div">
						<img src="{{ asset("products/".$product->pic) }}" alt="">
					</div>
					<div class="product-text-info-div">
						<div class="product-name-div">
							{{ $product->name }}
						</div>
						<div class="product-brand-div">
							{{ $product->marca }}
						</div>
						@if(isset($qr->end) && $qr->end == 1)
							<div class="product-punctuation">
								o 62/100
							</div>
						@endif
						<div class="product-description-div">
							{{ $product->description }}
						</div>
					</div>
				</div>
				<hr style="width: 50%; margin-left:25%;">
				@if(isset($qr->end) && $qr->end == 1)
					<div class="product-final-info-div">
						<div class="product-final-info-title">
							<h1>
								Huella de carbono
							</h1>
						</div>
						<div class="product-final-info-text">

						</div>
						<div class="co2" style="flex:1">
							<div class="dist-title">
								Distancia recorrida:
							</div>
							<div class="dist-value">
								694.73km
							</div>
						</div>
						<div class="dist" style="flex:1">
							<div class="co2-title">
								CO2 Producido:
							</div>
							<div class="co2-value">
								43.07 kg
							</div>
						</div>
						<img src="{{ asset('/images/score.png') }}" alt="" style="width:200px; display: block; margin: auto">
						<div class="map">
							<img src="{{asset('/images/map.jpeg')}}" alt="" style="width:300px; display: block; margin: auto">
						</div>
					</div>
				@endif
			</div>

			<!-- NODOS -->
			@if(count($nodos) > 0)
				<div class="card-body">
					<div style="text-align: center;"class="title">
						<h1>RECORRIDO</h1>
					</div>
					<br>
					<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
						@foreach($nodos as $nodo)
							<div class="step completed">
								<div class="step-icon-wrap">
								<div class="step-icon">{{ $nodo->lugar }}</div>
								</div>
								<!-- <h4 class="step-title">Confirmed Order</h4> -->
							</div>
						@endforeach
						@if(isset($qr->end) && $qr->end == 1)
							<div class="step completed">
								<div class="step-icon-wrap">
								<div class="step-icon">¡Tus manos!</i></div>
								</div>
							</div>
						@else
							<div class="step">
								<div class="step-icon-wrap">
								<div class="step-icon">Proximo destino...</i></div>
								</div>
							</div>
						@endif
					</div>
				</div>
			@endif
		</div>
		<br>
		@if(isset($qr->end) && $qr->end == 1)
			<div class="" style="display:flex">
				<div class="co2" style="flex:1">
					<div class="dist-title">
						Distancia recorrida:
					</div>
					<div class="dist-value">
						694.73km
					</div>
				</div>
				<div class="dist" style="flex:1">
					<div class="co2-title">
						CO2 Producido:
					</div>
					<div class="co2-value">
						43.07 kg
					</div>
				</div>
			</div>
			<img src="{{ asset('/images/score.png') }}" alt="" style="width:200px; display: block; margin: auto">
			<div class="map">
				<img src="{{asset('/images/map.jpeg')}}" alt="" style="width:300px; display: block; margin: auto">
			</div>
		@endif
		@if(isset($qr->end) && !$qr->end == 1)
			<div class="add-stop-div">
				<div class="add-stop-title">
					AÑADIR PARADA	
				</div>
				<form id="cityForm" class="add-stop-form">
					<label for="city" class="add-stop-form-title">Direccion:</label>
					<input type="text" id="city_tmp" name="city" class="add-stop-form-input">
					<button type="submit" class="add-stop-form-button">Confirmar</button>
				</form>
				<form id="createNode" method="get" action="/addnode">
					<input type="text" id="city" name="city" hidden>
					<input type="text" id="coordx" name="coordx" hidden>
					<input type="text" id="coordy" name="coordy" hidden>
					<input type="number" id="id" name="id" value="{{ $qr->id }}" hidden>
				</form>
				<div id="coordinates"></div>
				<!-- Custom Popup -->
				<div id="overlay"></div>

				<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
				<script>
					document.getElementById('cityForm').addEventListener('submit', function(event) {
						event.preventDefault();
						var city = document.getElementById('city_tmp').value;
						getCoordinates(city);
					});

					function getCoordinates(city) {
						var url = 'https://nominatim.openstreetmap.org/search?q=' + encodeURIComponent(city) + '&format=json&limit=1';

						fetch(url)
						.then(response => response.json())
						.then(data => {
							if (data.length > 0) {
								var latitude = data[0].lat;
								var longitude = data[0].lon;
								document.getElementById('coordx').value = latitude ;
								document.getElementById('city').value = city ;
								document.getElementById('coordy').value = longitude;

								showMapPopup(city, latitude, longitude);
							} else {
								document.getElementById('coordinates').innerHTML = '<p>Coordinates not found for the entered city.</p>';
							}
						})
						.catch(error => {
							console.error('Error fetching coordinates:', error);
							document.getElementById('coordinates').innerHTML = '<p>There was an error fetching coordinates. Please try again later.</p>';
						});
					}

					function showMapPopup(city, latitude, longitude) {
						document.getElementById('overlay').style.display = 'block';
						document.getElementById('mapPopup').style.display = 'block';

						document.getElementById('mapCoords').innerHTML = 'City: ' + city + '<br>Latitude: ' + latitude + '<br>Longitude: ' + longitude;

						var map = L.map('map').setView([latitude, longitude], 13);
						L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
							maxZoom: 18,
							attribution: '© OpenStreetMap'
						}).addTo(map);

						L.marker([latitude, longitude]).addTo(map)
							.bindPopup(city)
							.openPopup();

						document.getElementById('confirmButton').onclick = function() {
							closeMapPopup();
							document.getElementById("createNode").submit();
						};

						document.getElementById('cancelButton').onclick = function() {
							closeMapPopup();
							document.getElementById('coordinates').innerHTML = '<p>Coordinates submission cancelled.</p>';
						};
					}

					function closeMapPopup() {
						document.getElementById('overlay').style.display = 'none';
						document.getElementById('mapPopup').style.display = 'none';

						var mapElement = document.getElementById('map');
						if (mapElement._leaflet_id) {
							mapElement._leaflet_id = null;
						}
					}
				</script>
				@if(count($nodos) > 0)
					<div class="end-button-div">
						<form id="endNode" method="get" action="/endnode">
							<input type="hidden" id="id" name="id" value="{{ $qr->id }}">
							<button class="end-button" onclick='submitForm(event)'>Finalizar recorrido</button>
						</form>
						<script>
							function submitForm(event) {
								event.preventDefault();
								if (confirm('¿Estás seguro de que quieres finalizar el recorrido?')) {
									document.getElementById('endNode').submit();
								}
							}
						</script>
					</div>
				@endif
			</div>
		@endif
	</div>
	<div id="mapPopup">
		<div id="map"></div>
		<p id="mapCoords"></p>
		<button id="confirmButton">Confirm</button>
		<button id="cancelButton">Cancel</button>
	</div>
</div>
@endsection