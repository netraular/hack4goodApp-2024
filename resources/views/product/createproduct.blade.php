<style>
    /* General input styles */
    input, textarea, select {
        border: 2px solid gray;
        outline: none;
        border-radius: 6px;
        width: 100%;
    }

    /* Specific input styles */
    input[type="text"], .inputCategory {
        height: 2rem;
    }

    textarea {
        resize: none;
        height: 100%;
    }

    /* Label styles */
    .product-name-input-label, .product-brand-input-label, .product-description-input-label {
        position: absolute;
        background-color: white;
        color: gray;
        left: 4px;
        transition: all 0.2s ease-in;
        cursor: pointer;
        margin-top: 4px;
    }

    .product-description-input-label {
        top: 10px;
        left: 6px;
        margin-top: 0;
    }

    /* Focus and valid styles */
    input:is(:focus, :valid), select:is(:focus, :valid) {
        border: 2px solid black;
    }

    input:is(:focus, :valid) + .product-name-input-label,
    input:is(:focus, :valid) + .product-brand-input-label {
        transform: translateY(-12px);
        font-size: 9px;
        color: black;
    }

    textarea:is(:focus, :valid) + .product-description-input-label {
        transform: translateY(-15px);
        font-size: 9px;
        color: black;
    }

    /* Category input styles */
    #inputCategory.valid {
        border: 2px solid black;
        color: black;
    }

    /* Hidden file input */
    input[type="file"] {
        display: none;
    }

    /* Image input button styles */
    /* .product-img-input-btn {
    } */

    /* Image input icon styles */
    .product-img-input-icon {
        height: 3rem; /* Smaller icon size */
        width: 3rem;  /* Smaller icon size */
    }

    /* Image input container styles */
    .product-pic-div {
        flex: 2;
        display: flex;
        align-items: center;
        justify-content: center;
		width: 100%; /* Adjust this value to change the width */
		margin: 0 auto; /* Center the div horizontally */
    }

    /* Label for image input */
    #icon {
        border: 2px dotted gray;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 22rem;
        padding: 0;
        aspect-ratio: 1;
    }

    /* Image output styles */
    #output {
        display: none;
        width: 100%;
        height: 100%;
        border: 2px dotted black;
        border-radius: 6px;
        object-fit: cover;
        aspect-ratio: 1;
    }

    /* Responsive layout styles */
    .product-main-info-div {
        display: flex;
        flex-direction: row;
        gap: 1.75rem;
        width: 100%;
    }

    .product-three-main-div {
        flex: 3;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .product-description-div {
        height: 10rem;
        width: 100%;
        position: relative;
        display: flex;
    }

    /* Title styles */
    .product-title-div {
        font-size: 30px;
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        height: 2.75rem;
        width: 100%;
        text-align: center;
        border-bottom: 1rem;
    }

    .product-title-div span:first-child {
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
        color: white;
    }

    .product-title-div span:last-child {
        color: #BED669;
    }

    /* Button container */
    .product-confirm-div {
        margin: 0 auto;
        width: 33%;
    }

    /* Button styles */
    .btn-primary {
        width: 100%;
    }

    /* Media queries for responsiveness */
    @media (max-width: 768px) {
        .product-main-info-div {
            flex-direction: column;
        }

        .product-pic-div {
            order: -1;
        }
    }
</style>

<link href="https://unpkg.com/cropperjs/dist/cropper.min.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
@extends('layouts.app') 
@section('content')
<div class="container marketing">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="product-div" style="display: flex; flex-direction: column; gap: 1.75rem; width: 100%;">
            <div class="product-title-div">
                <span>CREA TU</span><span> PRODUCTO</span>
            </div>
            <form id="myForm" action="/createproductaction" method="post" enctype="multipart/form-data" style="display:flex; flex-direction: column; gap: 1.75rem; width: 100%">
                <!-- Barcode input -->
                <div class="product-barcode-div" style="position: relative;">
                    <label for='inputBarcode' class="product-barcode-input-label">Código de barras</label>
                    <input name="barcode" type="text" id="inputBarcode" value="{{ $barcode ?? '' }}" required>
                </div>

                <div class="product-main-info-div">
                    <div class="product-three-main-div">
                        <input name="companyid" type="number" id="userid" value="@auth{{ Auth::user()->id }}@endauth" hidden>

                        <!-- Name input -->
                        <div class="product-name-div" style="position: relative;">
                            <input name="name" maxlength="20" type="text" id="inputName" required>
                            <label for='inputName' class="product-name-input-label">Nombre del producto</label>
                        </div>

                        <!-- Brand input -->
                        <div class="product-brand-div" style="position: relative;">
                            <input name="brand" maxlength="20" type="text" id="inputBrand" required>
                            <label for='inputBrand' class="product-brand-input-label">Marca del producto</label>
                        </div>

                        <!-- Category input -->
                        <div class="product-category-div">
                            <select name="inputCategory" id="inputCategory" onchange="changeBorder()" class="inputCategory">
                                <option value="None">Categoria...</option>
                                <option value="Apples">Apples</option>
                                <option value="Tech">Tecnologia</option>
                                <option value="Ropa">Ropa</option>
                            </select>
                        </div>

                        <div class="product-description-div">
                            <textarea maxlength="600" name="description" id="inputDescription" required></textarea>
                            <label for="inputDescription" class="product-description-input-label">Descripción</label>
                        </div>
                    </div>

                    <!-- Picture input -->
                    <div class="product-pic-div">
                        @csrf
                        <input type="file" id="picture" class="product-img-input-btn" name="picture" accept="image/*;capture=camera" onchange="loadFile(event)">
                        <label id="icon" for="picture">
                            <img src="{{ URL::asset('/camera.png') }}" class="product-img-input-icon">
                        </label>
                        <img id='output' class="product-img-input">
                    </div>
                </div>

                <!-- Confirm button -->
                <input type="hidden" id="userAuth" value="{{ Auth::check() }}">
                <div class="product-confirm-div">
                    <button class="btn btn-primary" type="button" onClick="getData()">Crear producto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for cropping -->
<div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="image" src="#" alt="Picture" style="max-width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="cropButton">Crop</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Notice</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="alertModalBody">
                <!-- Alert message will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showAlert(message) {
        document.getElementById('alertModalBody').textContent = message;
        $('#alertModal').modal('show');
    }

    function loadFile(event) {
        var output = document.getElementById('output');
        var icon = document.getElementById('icon');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.height = '100%';
        output.style.width = '100%';
        output.style.border = '2px dotted black';
        output.style.borderRadius = '6px';
        icon.style.display = 'none';

        // Open the modal
        $('#cropModal').modal('show');

        // Initialize the cropper
        var image = document.getElementById('image');
        image.src = URL.createObjectURL(event.target.files[0]);
        var cropper = new Cropper(image, {
            aspectRatio: 1 / 1, // Square crop
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 1,
            cropBoxMovable: true,
            cropBoxResizable: true,
        });

        // Handle the crop button click
        document.getElementById('cropButton').addEventListener('click', function () {
            var canvas = cropper.getCroppedCanvas();
            output.src = canvas.toDataURL();
            output.style.display = 'block'; // Ensure the cropped image is displayed
            $('#cropModal').modal('hide');
            cropper.destroy();

            // Convert canvas to Blob and create a new File object
            canvas.toBlob(function (blob) {
                var file = new File([blob], 'cropped_image.png', { type: 'image/png' });
                var dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                document.getElementById('picture').files = dataTransfer.files;

                window.croppedFile = file;
            });
        });
    }

    window.onload = function() {
        var pic = document.getElementById('picture');
        pic.value = "";
    }

    function getData() {
        var name = document.getElementById('inputName').value.trim();
        var brand = document.getElementById('inputBrand').value.trim();
        var description = document.getElementById('inputDescription').value.trim();
        var category = document.getElementById('inputCategory').value;
        var out = document.getElementById('output');
        var value = document.getElementById('userid').value;
        var userAuth = document.getElementById('userAuth').value;

        var regex = /^[a-zA-Z0-9 ]+$/;

        if (name === "" || brand === "" || description === "" || category === "None" || out.src === "") {
            showAlert("Please fill out all required fields.");
            return;
        }

        if (!regex.test(name) || !regex.test(brand) || !regex.test(description)) {
            showAlert("Please use only letters or numbers!");
            return;
        }

        if (userAuth !== "1") {
            showAlert("Please Login to use this feature");
            return;
        }

        var form = document.getElementById('myForm');
        form.submit();
    }
</script>

<script>
    function changeBorder() {
        var select = document.getElementById("inputCategory");
        if (select.value !== "None") {
            select.classList.add("valid");
        } else {
            select.classList.remove("valid");
        }
    }
</script>
@endsection