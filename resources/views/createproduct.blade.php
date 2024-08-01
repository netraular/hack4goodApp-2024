@extends('layouts.app')
@section('content') 
<div class="container marketing">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
		<div class="product-div" style="display: flex; flex-direction: column; gap: 1.75rem; width: 100%;">
			<div class="product-title-div" style="font-size:30px; font-family: 'Oswold', sans-serif; font-weight: 700; height: 2.75rem; border-bottom: 1rem; width: 100%; text-align: center;">
				<span style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; color: white;"> CREA TU </span><span style="color: #BED669;"> PRODUCTO</span>
			</div>
			<form id="myForm" action="/createproductaction" method="post" enctype="multipart/form-data" style="display:flex; flex-direction: column; gap: 1.75rem; width: 100%">
				<div class="product-main-info-div" style="width: 100%; display: flex; flex-direction: row; gap: 1.75rem">
					<div class="product-three-main-div" style="flex: 1; display: flex; flex-direction: column; gap: 1.75rem;">
						<!-- Name input -->
						<div class="product-name-div" style="height: 1.75rem;width: 100%; position: relative; display: flex; align-items: center;">
							<input name="name" maxlength="20" type="text" id="inputName" required style="width: 100%"></input>
							<label for='inputName' class="product-name-input-label">Nombre del producto</label>
						</div>

						<!-- Brand input -->
						<div class="product-brand-div" style=" height: 1.75rem;width: 100%; position: relative; display: flex; align-items: center;">
							<input name="brand" maxlength="20" type="text" id="inputBrand" style="width: 100%;"required></input>
							<label for='inputBrand' class="product-brand-input-label">Marca del producto</label>
						</div>

						<!-- Category input -->
						<div class="product-category-div" style="height: 1.75rem; width: 100%">
							<select name="inputCategory" id="inputCategory" onchange="changeBorder()" class="inputCategory">
								<option value="None">Categoria...</option>
								<option value="Apples">Apples</option>
								<option value="Tech">Tecnologia</option>
								<option value="Ropa">Ropa</option>
							</select>	
						</div>
					</div>

					<!-- Picture input -->
					<div class="product-pic-div" style="flex: 1;">
						@csrf
						<input type="file" id="picture" class="product-img-input-btn" name="picture" accept="image/*;capture=camera" onchange="loadFile(event)">
						<label id="icon" for="picture" style="border: 2px dotted gray; border-radius: 6px; cursor: pointer; height: 100%; width: 100%;  display: flex; justify-content: center; align-items: center;"><img src="{{ URL::asset('/camera.png') }}" class="product-img-input-icon"></label>
						<img id='output' class="product-img-input">
					</div>
				</div>

				<!-- Description input -->
				<div class="product-description-div" style="height: 5.25rem;width: 100%; position: relative; display: flex;">
					<textarea maxlength="150" name="description" type="text" id="inputDescription" required style="width: 100%; height: 100%"></textarea>
					<label for="inputDescription" class="product-description-input-label">Descripción</label>
				</div>

				<!-- Confirm button -->
				<div class="product-confirm-div" style=" margin-left: 33%; margin-right: 33%;">  
					<button class="btn btn-primary" type="button" onClick="getData()" style="width: 100%;">Crear producto</button>
				</div>
			</form>
		</div>
	</div>
	<script>

		window.onload = function() {
			var pic = document.getElementById('picture');
			pic.value = "";
		}

		function loadFile(event) {
			var out = document.getElementById('output');
			var icon = document.getElementById('icon');
			out.src = URL.createObjectURL(event.target.files[0]);
			out.style.height = '8.75rem';
			out.style.width = '100%';
			out.style.border = '2px dotted black'
			out.style.borderRadius = '6px';
			icon.style.display = 'none';
			output.onload = function() {
				URL.revokeObjectURL(out.src)
			}
		}

		function getData() {
			var name = document.getElementById('inputName').value.trim();
			var brand = document.getElementById('inputBrand').value.trim();
			var description = document.getElementById('inputDescription').value.trim();
			var category = document.getElementById('inputCategory').value;
			var out = document.getElementById('output');

			var regex = /^[a-zA-Z0-9]+$/;

			if (name === "" || brand === "" || description === "" || category === "None" || out.src === "") {
				alert("Please fill out all required fields.");
				return;
			}

			if (!regex.test(name) || !regex.test(brand) || !regex.test(description)) {
				alert("Please use only leters or numbers!");
				return;
			}

			var form = document.getElementById('myForm').submit();
		}
	</script>
</div>
@endsection