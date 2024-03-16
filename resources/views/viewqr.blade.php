@extends('layouts.app')
@section('content')

<div class="container marketing">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
            </div>
			<div class="">
				<div class="">					
					<div class="" style="display:flex; flex-direction: row">
						<div class="">
							<div class="titulo">
								<div class="" style="font-size:24px">{{ $product->name }}</div>
							</div>
							<div class="marca">
								<div class="" >{{ $product->marca }}</div>
							</div>
						</div>
						
						<div class="foto" style="margin-left: auto">
							<img src="{{ asset($product->pic) }}" alt="" style="width:100%;max-width: 100px;">
						</div>
					</div>
					<br>
					<div class="">
						Descripcion: {{ $product->description }}
					</div>
				</div>
				@if(isset($qr->end) && $qr->end == 1)
				<div class="">
					<br><br>
					<div class="" style="font-size:20px">
						Recorrido:
					</div>
					<br>
					@foreach($nodos as $nodo)
						<div class="" style="font-family: 'Madimi One', sans-serif; font-weight:400; font-style: normal; font-size: 15px;">	{{ $nodo->lugar }}</div>
						<!-- <i class="bi bi-three-dots-vertical" style="color:#d2f7a6;"></i> -->
						<img src="{{ asset('/images/path.png') }}" alt="" style="height:50px">
					@endforeach
					<div class="" style="font-family: 'Madimi One', sans-serif; font-weight:400; font-style: normal; font-size: 15px;"> Tus manos !</div>
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
			<br>
				<div class="">
					AÑADIR PARADA	
				</div>
				<form id="cityForm">
					<label for="city">Introduce ciudad:</label>
					<input type="text" id="city_tmp" name="city">
					<button type="submit">Añadir parada</button>
				</form>
				<form id="createNode" method="get" action="/addnode">
					<input type="text" id="city" name="city" hidden>
					<input type="text" id="coordx" name="coordx" hidden>
					<input type="text" id="coordy" name="coordy" hidden>
					<input type="number" id="id" name="id" value="{{ $qr->id }}"hidden>
					<!-- <button type="submit">Create node</button> -->
				</form>
				<div id="coordinates"></div>
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
								document.getElementById('coordinates').innerHTML = '<p>Latitude: ' + latitude + '</p><p>Longitude: ' + longitude + '</p>';
								document.getElementById('coordx').value = latitude ;
								document.getElementById('city').value = city ;
								document.getElementById('coordy').value = longitude;					
								document.getElementById("createNode").submit(); 
							} else {
								document.getElementById('coordinates').innerHTML = '<p>Coordinates not found for the entered city.</p>';
							}
						})
						.catch(error => {
							console.error('Error fetching coordinates:', error);
							document.getElementById('coordinates').innerHTML = '<p>There was an error fetching coordinates. Please try again later.</p>';
						});
					}
				</script>
				@endif
        </div>
        </div>
@endsection