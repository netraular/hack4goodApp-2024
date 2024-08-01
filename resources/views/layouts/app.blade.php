<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="icon" href="{{ url('logo.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">

    <style>
      input {
        border: 2px solid gray;
        outline:none;
        border-radius: 6px;
      }

      textarea {
        border: 2px solid gray;
        outline:none;
        border-radius: 6px;
        resize: none;
      }
      
      .product-name-input-label {
        position: absolute;
        background-color: white;
        color: gray;
        left: 4px;
        transition: all 0.2s ease-in;
        cursor: pointer;
      }

      .product-brand-input-label {
        position: absolute;
        background-color: white;
        color: gray;
        left: 4px;
        transition: all 0.2s ease-in;
        cursor: pointer;
      }

      .product-description-input-label {
        position: absolute;
        background-color: white;
        color: gray;
        left: 6px;
        top: 10px;
        transition: all 0.2s ease-in;
        cursor: pointer;
      }

      input:is(:focus, :valid) {
        border: 2px solid black;
      }

      input:is(:focus, :valid) + .product-name-input-label {
        transform: translatey(calc(-1 * (0px) - 12px));
        font-size: 9px;
        color: black;
      }

      input:is(:focus, :valid) + .product-brand-input-label {
        transform: translatey(calc(-1 * (0px) - 12px));
        font-size: 9px;
        color: black;
      }

      textarea:is(:focus, :valid) + .product-description-input-label {
        transform: translatey(calc(-1 * (0px) - 15px));
        font-size: 9px;
        color: black;
      }

      .inputCategory {
        width: 100%;
        height: 1.75rem;
        color: gray;
        background: white;
        border: 2px solid gray;
        outline:none;
        border-radius: 6px;
      }

      #inputCategory.valid {
        border: 2px solid black;
        color: black;
      }

      input[type="file"] {
        display: none;
      }

      .product-img-input-btn {
      }

      .product-img-input-icon {
        height: 1.75rem;
      }
      
      .product-img-input {
        
      }
    </style>

</head>
<body>
    <div id="app">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>


    
<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a href='/'><img class="text-center" src="{{URL::asset('/logo.png')}}" style="width:50px  ;high:50px"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" href="/login">Particulares</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/empresas">Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/viewqr?id=126">Ejemplo producto final</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<br>
        <main class="py-4">
            @yield('content')
        </main>
        
    <footer class="mt-auto text-black-80">
      <hr>
        <p style="text-align:center">ECO2 es un proyecto de la hackaton hack4good formado por los integrantes: Zsolt Palfi, Raúl Aquilué, Alexandre Estapé, Joel Casals, Fabian Scorcelli, Adriá Sagrera</p>
      </footer>
    </div>
</body>
<script>
  function changeBorder() {
				var select = document.getElementById("inputCategory");
				if (select.value !== "None")
				{
					select.classList.add("valid");
				} else {
					select.classList.remove("valid");
				}
			}
</script>
</html>
