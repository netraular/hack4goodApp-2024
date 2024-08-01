@extends('layouts.app')

@section('content')
<img class="text-center" src="{{URL::asset('/images/particular 1.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
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
            <p><a class="btn btn-secondary" href="#">Ir al buscador &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img src="{{URL::asset('/images/comparador.jpg')}}" width="140" height="140" style="border-radius: 70px">
            <h2 class="fw-normal">Compara</h2>
            <p>Decide que productos comprar con nuestro comparador y guarda tus favoritos.</p>
            <p><a class="btn btn-secondary" href="#">Ir al comparador &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <img class="text-center" src="{{URL::asset('/images/particular 2.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/particular 3.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/particular 4.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/particular 5.png')}}" style="width:100%;max-width: 800px;margin:auto;display:block;">

</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

@endsection