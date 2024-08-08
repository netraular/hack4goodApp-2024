<style>
/* Container for centering the product info */
.center-container {
    display: flex;
    justify-content: center; /* Center horizontally */
}

.product-info-div {
    display: flex;
    align-items: center;
    max-width: 800px; /* Limit the maximum width */
    width: 100%;
    background: #f9f9f9; /* Light background for contrast */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    overflow: hidden; /* Ensure content does not overflow */
	gap: 2rem;
}

.product-pic-div {
    flex: 0 0 40%; /* 40% of the width for the image */
    padding: 10px; /* Padding around the image */
}

.product-pic-div img {
    width: 100%; /* Make image fill its container */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Remove bottom space under image */
}

.product-text-info-div {
    flex: 1; /* Take remaining space */
    padding: 10px; /* Padding around text */
	height:100%;
}

.product-name-div {
    font-size: 1.5em; /* Larger font size for name */
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

/* Responsive adjustments */
@media (max-width: 768px) {
    .product-info-div {
        flex-direction: column; /* Stack image and text vertically */
        text-align: center; /* Center text alignment */
		gap: 1rem;
    }

    .product-pic-div {
        flex: 0 0 auto; /* Image should not grow or shrink */
        margin-bottom: 10px; /* Space between image and text */
    }

    .product-text-info-div {
        flex: 1; /* Allow text to grow if needed */
        padding: 0; /* Remove padding in mobile view */
    }
}

@media (max-width: 480px) {
    .product-name-div {
        font-size: 1.2em; /* Slightly smaller font size on very small screens */
    }

    .product-brand-div {
        font-size: 0.9em; /* Slightly smaller font size */
    }

    .product-description-div {
        font-size: 0.9em; /* Slightly smaller font size */
    }
}

</style>

@extends('layouts.app')
@section('content')

<div class="container marketing">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
			<div class="center-container">
				<!-- INFORMACION -->
				<div class="product-info-div">
					<div class="product-pic-div">
						<img src="{{ asset($product->pic) }}" alt="">
					</div>
					<div class="product-text-info-div">
						<div class="product-name-div">
							{{ $product->name }}
						</div>
						<div class="product-brand-div">
							{{ $product->marca }}
						</div>
						<div class="product-description-div">
							{{ $product->description }}
						</div>
					</div>
				</div>
				<!-- <div class="">					
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
				</div> -->

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
				<!-- <div class="">
					<br><br>
					<div class="" style="font-size:20px">
						Recorrido:
					</div>
					<br>
					@foreach($nodos as $nodo)
						<div class="" style="font-family: 'Madimi One', sans-serif; font-weight:400; font-style: normal; font-size: 15px;">	{{ $nodo->lugar }}</div>
						<img src="{{ asset('/images/path.png') }}" alt="" style="height:50px">
					@endforeach
					<div class="" style="font-family: 'Madimi One', sans-serif; font-weight:400; font-style: normal; font-size: 15px;"> Tus manos !</div>
				</div> -->
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
		@if(isset($qr->end) && !$qr->end == 1)
			<div class="end-button-div">
				<form id="endNode" method="get" action="/endnode">
					<input type="hidden" id="id" name="id" value="{{ $qr->id }}">
					<button class="end-button" onclick='submitForm()'>END</button>
				</form>
				<script>
					function submitForm() {
						document.getElementById('endNode').submit();
					}
				</script>
			</div>
		@endif	
        </div>
@endsection