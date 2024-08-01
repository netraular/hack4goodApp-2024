@extends('layouts.app')

@section('content')
<img class="text-center" src="{{URL::asset('/images/particular 1.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;" data-aos="fade-down">

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row" data-aos="zoom-in" data-aos-delay="500">
        <div class="col-lg-4">
            <img src="{{URL::asset('/images/scan_button.gif')}}" width="140" height="140" style="border-radius: 70px">
            <h2 class="fw-normal">Escanea</h2>
            <p>Escanea tu producto favorito y averigua el impacto del transporte.</p>
            <form action="{{ route('scan.qr') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="qr_image" class="btn btn-primary">Escanear Producto</label>
                    <input type="file" class="form-control" id="qr_image" name="qr_image" style="display: none;" onchange="this.form.submit()">
                </div>
            </form>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img src="{{URL::asset('/images/buscador.png')}}" width="140" height="140" style="border-radius: 70px">
            <h2 class="fw-normal">Busca</h2>
            <p>Encuentra un listado de productos sostenibles cerca de tu zona.</p>
            <p><a href="{{ route('buscar.qr') }}" class="btn btn-primary">Buscar</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img src="{{URL::asset('/images/comparador.jpg')}}" width="140" height="140" style="border-radius: 70px">
            <h2 class="fw-normal">Compara</h2>
            <p>Compara entre cientos de productos y guarda tus favoritos.</p>
            <p><a class="btn btn-secondary" href="#">Ir al comparador &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <img class="text-center" src="{{URL::asset('/images/particular 2.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;" data-aos="fade-up" data-aos-delay="100">
    <img class="text-center" src="{{URL::asset('/images/particular 3.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;" data-aos="fade-up" data-aos-delay="400">
    <img class="text-center" src="{{URL::asset('/images/particular 4.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;" data-aos="fade-left" data-aos-delay="800">
    <img class="text-center" src="{{URL::asset('/images/particular 5.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;" data-aos="fade-right" data-aos-delay="200">

</div>

@endsection