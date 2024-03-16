@extends('layouts.app')
@section('content')
<div class="container marketing">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
			<div class="">
				<form action="/createproductaction" method="post" enctype="multipart/form-data">
					<div class="form-group row" class="col-sm-2 col-form-label">
						<label for="inputName" >Nombre</label>
						<div class="col-sm-10">
							<input name="name" type="text" id="inputName" placeholder="Nombre del producto" required>
						</div>
					</div>
					<br>
					<div class="form-group row" class="col-sm-2 col-form-label">
						<label for="inputBrand">Marca</label>
						<div class="col-sm-10">
							<input name="brand" type="text" id="inputBrand" placeholder="Nombre de la marca" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="inputDescription">Descripción</label>
						<div class="col-sm-10">
							<input name="description" type="text" id="inputDescription" placeholder="Descripción del producto" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="inputCategory">Categoria</label>
						<div class="col-sm-10">
							<select name="inputCategory" id="inputCategory">
								<option >Elige...</option>
								<option >Apples</option>
								<option >Tecnologia</option>
								<option >Ropa</option>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						@csrf
						<label for="picture">Selecciona o captura una imagen:</label><br>
						<input type="file" id="picture" name="picture" accept="image/*;capture=camera"><br>
					</div>
					<br><br>
					<button class="btn btn-primary" type="submit" onClick="getData()">Crear producto</button>
				</form>
			</div>
        </div>
		<script>
			function getData() {
				// Fetch data from form fields
				var name = document.getElementById('inputName').value.trim();
				var brand = document.getElementById('inputBrand').value.trim();
				var description = document.getElementById('inputDescription').value.trim();
				var category = document.getElementById('inputCategory').value;
				// var	photo = document.getElementById('validatedCustomFile').files[0];

				// Check if required fields are filled
				if (name === "" || brand === "" || description === "" || category === "Choose...") {
					alert("Please fill out all required fields.");
					return; // Stop further execution
				}

				// Perform actions with the form data here
				console.log("Name: " + name);
				console.log("Brand: " + brand);
				console.log("Description: " + description);
				console.log("Category: " + category);
				// console.log(photo)
				// Add further processing here such as sending data to a server
			}
		</script>
	</div>
@endsection