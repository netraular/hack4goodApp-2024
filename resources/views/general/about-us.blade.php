@extends('layouts.app')

@section('content')

@php
  $aboutCssVersion = @filemtime(public_path('css/about-us.css')) ?: time();
@endphp
<link rel="stylesheet" href="{{ asset('css/about-us.css') }}?v={{ $aboutCssVersion }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="container py-4">
  <header class="mb-4 text-center">
    <p class="text-uppercase text-muted mb-1">Equipo ECO2</p>
    <h1>Quiénes estamos detrás del proyecto</h1>
    <p class="lead">Nos conocimos en HackForGood 2024 y juntamos perfiles de desarrollo, datos y estrategia para experimentar con ideas de impacto climático en apenas un fin de semana.</p>
  </header>

  <div class="cards">
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('programador1.jpeg') }}" alt="Raúl Aquilué">
        <div class="bio">
          <p>Full stack developer con 4+ años de experiencia en productos digitales.</p>
        </div>
      </div>
      <a href="https://raular.com" class="social-icon"><i class="fa-brands fa-github"></i></a>
      <div class="card-content-wrapper">
        <a href="https://raular.com" class="card-content">
          <h3>Raúl Aquilué</h3>
          <p>SysAdmin y principal desarrollador de la plataforma</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('programador2.jpeg') }}" alt="Zsolt Palfi">
        <div class="bio">
          <p>Estudiante de informática que persigue retos que impacten en la sociedad.</p>
        </div>
      </div>
      <div class="card-content-wrapper">
        <a href="#" class="card-content">
          <h3>Zsolt Palfi</h3>
          <p>Arquitecto de software y brújula técnica del equipo</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('programador3.jpeg') }}" alt="Fabian Scorcelli">
        <div class="bio">
          <p>Creativo audiovisual que traduce datos en historias inspiradoras.</p>
        </div>
      </div>
      <div class="card-content-wrapper">
        <a href="#" class="card-content">
          <h3>Fabian Scorcelli</h3>
          <p>Logística, atención a usuarios y narrativa visual</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('matematico1.jpeg') }}" alt="Alexandre Estapé">
        <div class="bio">
          <p>Matemático especializado en métricas climáticas y optimización.</p>
        </div>
      </div>
      <div class="card-content-wrapper">
        <a href="#" class="card-content">
          <h3>Alexandre Estapé</h3>
          <p>Creador del algoritmo detrás del ECO2 Score</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('empresario1.jpeg') }}" alt="Joel Casals">
        <div class="bio">
          <p>Conector con empresas y responsable de la narrativa de negocio.</p>
        </div>
      </div>
      <div class="card-content-wrapper">
        <a href="#" class="card-content">
          <h3>Joel Casals</h3>
          <p>Diseño de pitch, partnerships y validación de mercado</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-img-wrapper">
        <img src="{{ asset('empresario1.jpeg') }}" alt="Adrià Sagrera">
        <div class="bio">
          <p>Impulsa la experiencia de usuario y el enfoque de impacto.</p>
        </div>
      </div>
      <div class="card-content-wrapper">
        <a href="#" class="card-content">
          <h3>Adrià Sagrera</h3>
          <p>Estrategia de presentación y co-diseño de negocio</p>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="container py-5" id="hack4good">
  <div class="row g-4 align-items-center">
    <div class="col-lg-7">
      <article class="news-article p-4 shadow-sm bg-white rounded-4">
        <header class="mb-3">
          <p class="text-muted mb-1">14 de marzo de 2024</p>
          <h2 class="news-title">Nuestra experiencia en HackForGood</h2>
        </header>
        <p>Telefónica convocó la novena edición de HackForGood con el lema “Imaginémonos un mundo más sostenible”. Más de 1.000 jóvenes de 25 universidades y del Campus 42 se reunieron para diseñar soluciones tecnológicas de impacto social, y ECO2 fue una de las ideas creadas para el reto.</p>
        <p>El hackathon, organizado por Cátedras Telefónica, la Universidad Complutense y Fundación Hazloposible, conectó perfiles de ingeniería, diseño y negocio para que colaboraran durante tres días en retos reales. Nuestro equipo trabajó desde Barcelona, compartiendo sede con la Universitat Politècnica de Catalunya, la UPF, la UB y la URV.</p>
        <p>Durante las 48 horas construimos un prototipo funcional, documentamos el cálculo básico del ECO2 Score y recogimos feedback de mentores. Tras el evento cada persona volvió a sus proyectos, pero dejamos todo publicado para que otras iniciativas puedan retomarlo o adaptarlo.</p>
        <footer class="mt-4 d-flex flex-column flex-md-row gap-3">
          <a href="https://www.telefonica.es/es/sala-comunicacion/prensa/telefonica-convoca-hackforgood-en-cuatro-universidades-catalanas-y-42-bcn/" target="_blank" rel="noopener" class="btn btn-primary">Leer la noticia completa</a>
          <span class="text-muted">Fuente original: Telefónica</span>
        </footer>
      </article>
    </div>
    <div class="col-lg-5">
      <div class="p-4 bg-dark text-white rounded-4 h-100">
        <h3 class="mb-3">Lo que nos llevamos del hackathon</h3>
        <ul class="list-unstyled mb-4">
          <li class="mb-2">✔ Aprendimos a traducir datos de emisiones en un tablero sencillo para el jurado.</li>
          <li class="mb-2">✔ Refinamos un relato común para presentar la idea a mentores y equipos vecinos.</li>
          <li class="mb-2">✔ Documentamos los pasos clave para que cualquiera replique el prototipo.</li>
        </ul>
        <div class="row text-center g-3">
          <div class="col-6">
            <div class="bg-white text-dark rounded-3 p-3">
              <p class="fs-3 fw-bold mb-0">48h</p>
              <small>de prototipado intenso</small>
            </div>
          </div>
          <div class="col-6">
            <div class="bg-white text-dark rounded-3 p-3">
              <p class="fs-3 fw-bold mb-0">8</p>
              <small>mentores que nos dieron feedback</small>
            </div>
          </div>
          <div class="col-12">
            <div class="bg-white text-dark rounded-3 p-3">
              <p class="fs-3 fw-bold mb-0">5</p>
              <small>ideas abiertas para futuras pruebas</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container pb-5">
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="p-4 bg-light rounded-4 h-100">
        <h3>Qué sigue para ECO2</h3>
        <p>El proyecto nació como experimento y hoy vive como código abierto. Si volvemos a retomar la idea, nos gustaría enfocarnos en:</p>
        <ul>
          <li>Limpiar el dataset y dejar scripts reproducibles para futuras hackatones.</li>
          <li>Publicar dashboards comparativos sencillos a partir del prototipo inicial.</li>
          <li>Invitar a comunidades climáticas a probar los QR y compartir mejoras.</li>
        </ul>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="p-4 border rounded-4 h-100">
        <h3>Nuestros compromisos</h3>
        <p>Creemos en la transparencia radical y en el uso responsable de los datos, incluso en un prototipo. Por eso:</p>
        <ul>
          <li>Compartimos la metodología que usamos durante el hackathon para que otros la revisen.</li>
          <li>Mantenemos las licencias abiertas y los repositorios públicos mientras haya interés.</li>
          <li>Reunimos materiales educativos y enlaces a recursos externos para complementar el prototipo.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

@endsection



