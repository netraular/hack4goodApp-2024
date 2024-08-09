@extends('layouts.app')

@section('content')

@if ($showBanner)
<div class="d-flex justify-content-center align-items-center">
    <div class="alert alert-success text-center" role="alert" data-aos="zoom-in">
        <h2><b>Esta web es un proyecto del evento Hack4Good.</b></h2>
        <p>{{ $banner->message ?? '' }}</p>
        <a href="/hack4good" target="_blank" class="btn btn-primary">Más información</a>
        <a href="{{ url('/reset-banner-cookie') }}" class="btn btn-secondary">Ocultar este mensaje</a>
    </div>
</div>
@endif

@include('popups.errorPopup')

<img class="text-center mx-auto d-block" src="{{ URL::asset('/images/particular 1.png') }}" style="max-width: 1000px;" data-aos="fade-down">

<div class="container marketing">
    <div class="row" data-aos="zoom-in" data-aos-delay="500">
        <div class="col-lg-4 text-center">
            <img src="{{ URL::asset('/images/scan_button.gif') }}" width="140" height="140" style="border-radius: 70px" alt="Escanea">
            <h2 class="fw-normal">Escanea</h2>
            <p>Escanea tu producto favorito y averigua el impacto del transporte.</p>
            <form action="{{ route('scan.qr') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="qr_image" class="btn btn-primary">Escanear Producto</label>
                <input type="file" class="form-control" id="qr_image" name="qr_image" style="display: none;" onchange="this.form.submit()">
            </form>
        </div>
        <div class="col-lg-4 text-center">
            <img src="{{ URL::asset('/images/buscador.png') }}" width="140" height="140" style="border-radius: 70px" alt="Busca">
            <h2 class="fw-normal">Busca</h2>
            <p>Encuentra un listado de productos sostenibles cerca de tu zona.</p>
            <a href="{{ route('buscar.qr') }}" class="btn btn-primary">Buscar</a>
        </div>
        <div class="col-lg-4 text-center">
            <img src="{{ URL::asset('/images/comparador.jpg') }}" width="140" height="140" style="border-radius: 70px" alt="Compara">
            <h2 class="fw-normal">Compara</h2>
            <p>Compara entre cientos de productos y guarda tus favoritos.</p>
            <a class="btn btn-secondary" href="#">Ir al comparador &raquo;</a>
        </div>
    </div>

    <img class="text-center mx-auto d-block" src="{{ URL::asset('/images/particular 2.png') }}" style="max-width: 1000px;" data-aos="fade-up" data-aos-delay="100">
    <img class="text-center mx-auto d-block" src="{{ URL::asset('/images/particular 3.png') }}" style="max-width: 800px;" data-aos="fade-up" data-aos-delay="400">
    <img class="text-center mx-auto d-block" src="{{ URL::asset('/images/particular 4.png') }}" style="max-width: 800px;" data-aos="fade-left" data-aos-delay="800">
    <img class="text-center mx-auto d-block" src="{{ URL::asset('/images/particular 5.png') }}" style="max-width: 800px;" data-aos="fade-right" data-aos-delay="200">
</div>

@endsection