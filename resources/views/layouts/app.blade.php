<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'hack4good') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Animation On Scroll library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ url('logo.ico') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')

</head>
<body>
    <div id="app">
        <header data-bs-theme="dark">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a href='/'><img class="text-center" src="{{ URL::asset('/logo.png') }}" style="width:50px; height:50px"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/hack4good">Hack4Good</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/empresas">Empresas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/about-us">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/viewqr?id=1">Ejemplo</a>
                                <!-- Aqui habia puesto un {'{ $alert }'} despues de 'Ejemplo' daba error! -->
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @if(isset($alert))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $alert }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        </script>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
        
        <footer class="mt-auto text-black-80">
            <hr>
            <p style="text-align:center">ECO2 es un proyecto de la hackaton hack4good formado por los integrantes: Raúl Aquilué, Joel Casals, Alexandre Estapé, Zsolt Palfi, Adriá Sagrera, Fabian Scorcelli. <a href="/about-us">¿Quienes somos?.</a></p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" defer></script>

</body>
</html>