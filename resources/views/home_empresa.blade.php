@extends('layouts.app')

@section('content')
<img class="text-center" src="{{URL::asset('/images/empresa 1.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">



  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
      <img src="{{URL::asset('/images/transporte.png')}}" width="140" height="140" style="border-radius: 70px">
        <h2 class="fw-normal">Añadir paradas</h2>
        <p>Escanea el qr de tu producto y añade un nuevo punto en el trayecto.</p>
        <form action="{{ route('scan.qr') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="qr_image" class="btn btn-primary">Escanear Producto</label>
                <input type="file" class="form-control" id="qr_image" name="qr_image" style="display: none;" onchange="this.form.submit()">
            </div>
        </form>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="{{URL::asset('/images/add product.png')}}" width="140" height="140" style="border-radius: 70px">
        <h2 class="fw-normal">Controlar productos</h2>
        <p>Añade tus productos a la web para poder empezar a crear códigos de seguimiento.</p>
        <p><a class="btn btn-secondary" href="/createproduct">Añadir producto &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src="{{URL::asset('/images/scan_button.gif')}}" width="140" height="140" style="border-radius: 70px">
        <h2 class="fw-normal">Generar QRs</h2>
        <p>Tienes un pedido distinto? Crea un QR único y empieza a gestionar su trayecto.</p>
        <p><a class="btn btn-secondary" href="/createqr">Generar QR &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <img class="text-center" src="{{URL::asset('/images/empresa 2.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/empresa 4.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/empresa 5.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">
    <img class="text-center" src="{{URL::asset('/images/empresa 6.png')}}" style="width:100%;max-width: 1000px;margin:auto;display:block;">

    


  

</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

@endsection
