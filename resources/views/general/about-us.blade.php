@extends('layouts.app')

@section('content')

      <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

      <section>


        <div class="cards">
          <div class="card">
            <div class="card-img-wrapper">
              <img src="{{ asset('programador1.jpeg') }}" alt="Raúl Aquilué">
              <div class="bio">
                <p>I'm a full stack web developer with 4+ years of experience.</p>
              </div>
            </div>
            <a href="https://github.com/netraular" class="social-icon"><i class="fa-brands fa-github"></i></a>
            <div class="card-content-wrapper">
              <a href="https://github.com/netraular" class="card-content">
                <h3>Raul Aquilue</h3>
                <p>Sys admin and main programmer of the website</p>
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
                <p>I'm a computer science student in search of new proyects.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class=""></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>Zsolt Palfi</h3>
                <p>Thinker and Main programmer of the website</p>
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
                <p>.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class=""></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>Fabian Scorcelli</h3>
                <p>Producer of the video presentation</p>
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
            <p>.</p>
          </div>
        </div>
        <a href="#" class="social-icon"><i class=""></i></a>
        <div class="card-content-wrapper">
          <a href="#" class="card-content">
            <h3>Alexandre Estapé</h3>
            <p>mathematician behind the CO2 score</p>
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
                <p>.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class=""></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>Joel Casals</h3>
                <p>Designer of the presentation and business logic</p>
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
                <p>.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class=""></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>Adrià Sagrera</h3>
                <p>Designer of the presentation and business logic</p>
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
          </div>
      </body>
      </html>



@endsection



