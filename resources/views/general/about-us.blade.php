@extends('layouts.app')

@section('content')


      <!DOCTYPE html>
      <html>
      <head>
          <title>{{ config('app.name') }} - About Us</title>
          <link rel="stylesheet" href="{{ asset('css/about-us.css') }}">
          <!-- Font Awesome CDN -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style> 
      .back {
        position: relative;
        display: inline-block;
        text-decoration: none;
        padding: 10px 10px 10px 40px;
      }

      .back h4 {
        color: #4A4F6A;
        font-size: 16px;
        transform: translateY(8px);
        transition: transform 500ms 0s cubic-bezier(0.2, 0, 0, 1);
      }

      .back span {
        opacity: 0;
        color: #858BA9;
        font-size: 12px;
        font-weight: 300;
        display: inline-block;
        transform: translateY(10px);
        transition:
          transform 500ms 0s cubic-bezier(0.2, 0, 0, 1),
          opacity 500ms 0s cubic-bezier(0.2, 0, 0, 1)
      }

      .back div {
        top: 11px;
        left: 0;
        content: '';
        width: 30px;
        height: 30px;
        display: block;
        overflow: hidden;
        position: absolute;
        border-radius: 50%;
        transform: scale(1);
        background-color: #E9E7F2;
        transition: transform 400ms 0s cubic-bezier(0.2, 0, 0, 1.6);
      }

      .back div::after {
        top: 0;
        left: 0;
        content: '';
        width: 60px;
        height: 30px;
        position: absolute;
        background-position: 0 0;
        background-image: url("{{ URL::asset('/backarrow.svg') }}");
        transition: transform 400ms 0s cubic-bezier(0.2, 0, 0, 1);
      }
      .back svg {
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 60px;
                  height: 30px;
                  fill: #AEC7C8;
                  transition: transform 400ms 0s cubic-bezier(0.2, 0, 0, 1);
              }

      .back:hover h4 {
        color: #171922;
      }

      .back:hover h4,
      .back:hover span {
        opacity: 1;
        transform: translateY(0);
      }

      .back:hover div {
        transform: scale(1.1);
        background-color: white;
        box-shadow:
          0 2px 10px 0 rgba(185,182,198,0.00),
          0 1px 3px 0 rgba(175,172,189,0.25);
      }

      .back:hover div::after {
        transform: translateX(-30px);
      }
      </style>
        </head>
      <body>
        
        <a href="javascript:history.back()" class="back">
          <div></div>
          <h4>eco2</h4>
          <span>Back to home</span>
        </a>

      <section>


        <h2>Hack4Good Team</h2>
        <h3> HackForGood, un evento que reúne a más de 1.000 estudiantes en varias ciudades, para trabajar juntos en la creación de soluciones de tecnología con un fin social.</h3>
        <a href="https://hackforgood.net/" target="_blank">Más información</a>  
        <div class="bio">GreenPath | EcoRoute | GreenLane | EcoLog.</d>
        <div class="cards">
          <div class="card">
            <div class="card-img-wrapper">
              <img src="https://media.licdn.com/dms/image/C4E12AQHdMlCFoSQXKg/article-cover_image-shrink_600_2000/0/1618337994667?e=2147483647&v=beta&t=bBRlORfJ6CjCTw06B7HYMhxR8OA1jLnqnxsxByijg9I" alt="Joss Anderson">
              <div class="bio">
                <p>Joss is an experienced art director with over 10 years in the industry. He loves creating visually stunning designs.</p>
              </div>
            </div>
            <a href="https://media1.tenor.com/m/bedbc9qi-PcAAAAC/rick-ashtley-never-gonna-give-up.gif" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>joss anderson</h3>
                <p>art director</p>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                  </svg>
                </div>

              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-img-wrapper">
              <img src="https://media.licdn.com/dms/image/C5612AQHIZlh5-UgCYQ/article-cover_image-shrink_600_2000/0/1612830082562?e=2147483647&v=beta&t=zZ55bGiUPjQxLcVw7_iSL99y12X5P9LAfHezeMiJTXs" alt="Joss Anderson">
              <div class="bio">
                <p>Blah.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>Eric Theodore Cartman</h3>
                <p>Data ScienTits</p>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                  </svg>
                </div>

              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-img-wrapper">
              <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/981d680a-9582-442f-ac31-452016dfbe75/dgnzd0j-bb87f023-678e-4f42-8364-ceb135b42d50.png/v1/fill/w_900,h_675,q_80,strp/llama_worker_by_danielbdesigns_dgnzd0j-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzk4MWQ2ODBhLTk1ODItNDQyZi1hYzMxLTQ1MjAxNmRmYmU3NVwvZGduemQwai1iYjg3ZjAyMy02NzhlLTRmNDItODM2NC1jZWIxMzViNDJkNTAucG5nIiwiaGVpZ2h0IjoiPD02NzUiLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLndhdGVybWFyayJdLCJ3bWsiOnsicGF0aCI6Ilwvd21cLzk4MWQ2ODBhLTk1ODItNDQyZi1hYzMxLTQ1MjAxNmRmYmU3NVwvZGFuaWVsYmRlc2lnbnMtNC5wbmciLCJvcGFjaXR5Ijo5NSwicHJvcG9ydGlvbnMiOjAuNDUsImdyYXZpdHkiOiJjZW50ZXIifX0._UDfv9ArT8s1wrd9MNy_ZHahW_iB4U7KyNxfmC7lV6I" alt="James Newton">
              <div class="bio">
                <p>Blah.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class="fa-brands fa-github"></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>james newton</h3>
                <p>UX Designer</p>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                  </svg>
                </div>

              </a>
            </div>
          </div>
          <div class="card">
        <div class="card-img-wrapper">
          <img src="https://www.ft.com/__origami/service/image/v2/images/raw/https%3A%2F%2Fd1e00ek4ebabms.cloudfront.net%2Fproduction%2Fb8a98c52-8dbd-4452-8883-fce59ddabd60.jpg?source=next-article&fit=scale-down&quality=highest&width=700&dpr=1" alt="Emily Carter">
          <div class="bio">
            <p>Blah.</p>
          </div>
        </div>
        <a href="#" class="social-icon"><i class="fa-brands fa-github"></i></a>
        <div class="card-content-wrapper">
          <a href="#" class="card-content">
            <h3>Emily Carter</h3>
            <p>Graphic Designer</p>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </div>
          </a>
        </div>
      </div>

          <div class="card">
            <div class="card-img-wrapper">
              <img src="https://www.usatoday.com/gcdn/presto/2019/06/27/USAT/7e61c568-2014-4e4d-ba3a-500b64e44e54-XXX_C07_ALF_CELEB_PICKS_24.JPG?width=1200&disable=upscale&format=pjpg&auto=webp" alt="Oliver Jones">
              <div class="bio">
                <p>Blah.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>oliver jones</h3>
                <p>web designer</p>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                  </svg>
                </div>

              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-img-wrapper">
              <img src="https://ih1.redbubble.net/image.3148315643.0063/bg,f8f8f8-flat,750x,075,f-pad,750x1000,f8f8f8.u1.jpg" alt="Noah Wilson">
              <div class="bio">
                <p>Blah.</p>
              </div>
            </div>
            <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
            <div class="card-content-wrapper">
              <a href="#" class="card-content">
                <h3>noah wilson</h3>
                <p>seo expert</p>
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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



