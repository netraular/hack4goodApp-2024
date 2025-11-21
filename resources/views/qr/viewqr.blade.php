<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script type="text/javascript" src="https://code.jscharting.com/latest/modules/types.js"></script>

@extends('layouts.app')

@push('styles')
    @vite('resources/css/viewqr.css')
@endpush

@section('content')

@php
	$completedJourney = isset($qr->end) && $qr->end == 1;
	$nodeCount = count($nodos);
	$score = null;
	$colorClass = '';
	$scoreHex = '#16a34a';
	$distanceKm = null;
	$co2Kg = null;

	if ($completedJourney) {
		$baseScore = max(20, 100 - ($nodeCount * 8));
		$randomVariance = rand(-8, 8); // Mantiene variación ligera por vista
		$score = max(5, min(100, $baseScore + $randomVariance));

		if ($score < 40) {
			$colorClass = 'bg-danger';
			$scoreHex = '#dc2626';
		} elseif ($score < 70) {
			$colorClass = 'bg-warning';
			$scoreHex = '#f59e0b';
		} else {
			$colorClass = 'bg-success';
			$scoreHex = '#16a34a';
		}

		$distanceKm = round(2000 * (1 - ($score / 100)));
		$co2Kg = round(250 * (1 - ($score / 100)), 1);
	}
@endphp

<div class="container marketing">
	
@if(session('error'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
@if($product->user_id == null)
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Notice:</strong> This product is not real and is only here for demo purposes.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
	<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
		<div class="product-container">
			<div class="product-info-container">
				<div class="product-general-info">
					<div class="product-general-pic">
						<img src="{{ asset("products/".$product->pic) }}" alt="">
					</div>
					<div class="product-general-text">
						<div class="product-general-name">
							<h1>{{ $product->name }}</h1>
						</div>
						<div class="product-general-brand">
							<h4>{{ $product->marca }}</h4>
						</div>
						@if($completedJourney)
							<div class="product-punctuation-div">
								<div class="product-punctuation d-flex align-items-center">
									<span class="circle {{ $colorClass }}"></span>
									<span class="ms-2">{{ $score }}/100</span>
								</div>
							</div>
						@endif
						<div class="product-general-description">
							<p>{{ $product->description }}</p>
						</div>
					</div>
				</div>
				<hr style="width: 50%; margin-left:25%;">
				@if($completedJourney)
				<div class="product-impact">
					<div class="product-impact-title">
						<h3>Product Impact</h3>
					</div>
					<div class="product-impact-info">
						<div class="product-impact-gauge-wrapper">
							<canvas
								id="productImpactGaugeCanvas"
								class="product-impact-gauge-canvas"
								width="260"
								height="140"
								data-score="{{ $score }}"
								data-color="{{ $scoreHex }}"
							></canvas>
							<div class="product-impact-score-label" style="color: {{ $scoreHex }};">
								<span>Impact Score</span>
								<strong>{{ $score }}/100</strong>
							</div>
						</div>
						<div class="product-impact-distance">
							<div class="product-impact-distance-img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 fill-primary">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 21C7.5 19.4 9 17.9673 9 16.2C9 14.4327 7.65685 13 6 13C4.34315 13 3 14.4327 3 16.2C3 17.9673 4.5 19.4 6 21ZM6 21H17.5C18.8807 21 20 19.8807 20 18.5C20 17.1193 18.8807 16 17.5 16H15M18 11C19.5 9.4 21 7.96731 21 6.2C21 4.43269 19.6569 3 18 3C16.3431 3 15 4.43269 15 6.2C15 7.96731 16.5 9.4 18 11ZM18 11H14.5C13.1193 11 12 12.1193 12 13.5C12 14.8807 13.1193 16 14.5 16H15.6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
							</div>
							<div class="product-impact-distance-text">
								<div class="product-impact-distance-title">
									Distance Traveled
								</div>
								<div class="product-impact-distance-info">

									{{ number_format($distanceKm) }} km
								</div>
							</div>
						</div>
						<div class="product-impact-co2">
							<div class="product-impact-co2-img">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 fill-primary" >
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.44893 17.009C-0.246384 7.83762 7.34051 0.686125 19.5546 3.61245C20.416 3.81881 21.0081 4.60984 20.965 5.49452C20.5862 13.288 17.0341 17.7048 6.13252 17.9857C5.43022 18.0038 4.76908 17.6344 4.44893 17.009Z" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3.99999 21C5.50005 15.5 6 12.5 12 9.99997" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
								</svg>
							</div>
							<div class="product-impact-co2-text">
								<div class="product-impact-co2-title">
									C02 Emisions
								</div>
								<div class="product-impact-co2-info">
								{{ $co2Kg }} kg
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>

			@if(count($nodos) > 0)
			<div class="product-journey-container">
				<div class="product-journey">
					<div class="product-journey-title">
						<h3>Product Journey</h3>
					</div>
					<div class="product-journey-steps-container">
						@foreach($nodos as $nodo)
							<div class="product-journey-steps">
								<div class="product-journey-steps-number-container">
									<div class="product-journey-steps-number">{{ $loop->iteration }}</div>
								</div>
								<div class="product-journey-steps-text">
									<div class="product-journey-steps-name">{{ $nodo->lugar }}</div>
									<div class="product-journey-steps-description">Shipped</div>
								</div>
							</div>
						@endforeach
						@if(isset($qr->end) && $qr->end == 1)
							<div class="product-journey-steps">
								<div class="product-journey-steps-number-container">
									<div class="product-journey-steps-number">{{ count($nodos) + 1 }}</div>
								</div>
								<div class="product-journey-steps-text">
									<div class="product-journey-steps-name">¡Tus manos!</div>
									<div class="product-journey-steps-description">Shipped</div>
								</div>
							</div>
						@else
							<div class="product-journey-steps">
								<div class="product-journey-steps-number-container">
									<div class="product-journey-steps-number">{{ count($nodos) + 1 }}</div>
								</div>
								<div class="product-journey-steps-text">
									<div class="product-journey-steps-name">Proximo destino...</div>
									<div class="product-journey-steps-description">Shipped</div>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
			@endif
		</div>
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

@if($completedJourney)
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const canvas = document.getElementById('productImpactGaugeCanvas');
			if (!canvas || !canvas.getContext) {
				return;
			}

			const score = Number(canvas.dataset.score || 0);
			const pointerColor = canvas.dataset.color || '#16a34a';
			const ctx = canvas.getContext('2d');
			const width = canvas.width;
			const height = canvas.height;
			const centerX = width / 2;
			const centerY = height - 10;
			const radius = Math.min(centerX, height) - 20;
			const segments = [
				{ ratio: 0.4, color: '#dc2626' },
				{ ratio: 0.3, color: '#f59e0b' },
				{ ratio: 0.3, color: '#16a34a' }
			];

			ctx.clearRect(0, 0, width, height);
			let currentAngle = Math.PI; // start at 180° for left-most point
			segments.forEach(segment => {
				ctx.beginPath();
				ctx.strokeStyle = segment.color;
				ctx.lineWidth = 18;
				ctx.lineCap = 'round';
				const sweep = Math.PI * segment.ratio;
				ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + sweep, false);
				ctx.stroke();
				currentAngle += sweep;
			});

			const clampedScore = Math.min(Math.max(score, 0), 100);
			const pointerAngle = Math.PI + (Math.PI * (clampedScore / 100));
			const pointerLength = radius - 10;
			const pointerX = centerX + pointerLength * Math.cos(pointerAngle);
			const pointerY = centerY + pointerLength * Math.sin(pointerAngle);

			ctx.beginPath();
			ctx.strokeStyle = pointerColor;
			ctx.lineWidth = 4;
			ctx.moveTo(centerX, centerY);
			ctx.lineTo(pointerX, pointerY);
			ctx.stroke();

			ctx.beginPath();
			ctx.fillStyle = pointerColor;
			ctx.arc(pointerX, pointerY, 5, 0, Math.PI * 2);
			ctx.fill();

			ctx.beginPath();
			ctx.fillStyle = '#0f172a';
			ctx.arc(centerX, centerY, 5, 0, Math.PI * 2);
			ctx.fill();
		});
	</script>
@endif

@endsection